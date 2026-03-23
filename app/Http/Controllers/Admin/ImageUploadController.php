<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function index(Request $request)
    {
        $query = ImageLibrary::with('user')
            ->where('mime_type', 'like', 'image/%');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('original_name', 'like', "%{$search}%")
                  ->orWhere('alt_text', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status === 'active');
        }

        // Gallery tag filter
        if ($request->filled('gallery')) {
            if ($request->gallery === 'tagged') {
                $query->whereJsonContains('tags', 'gallery');
            } elseif ($request->gallery === 'not-tagged') {
                $query->where(function($q) {
                    $q->whereJsonDoesntContain('tags', 'gallery')
                      ->orWhereNull('tags');
                });
            }
        }

        // Sort functionality
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        if (in_array($sortBy, ['title', 'created_at', 'size', 'original_name'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $images = $query->paginate(24)->withQueryString();

        return view('admin.content.image-upload.index', compact('images'));
    }

    public function create()
    {
        return view('admin.content.image-upload.create');
    }

    public function store(Request $request)
    {
        // Validate that files are present
        if (!$request->hasFile('files') || count($request->file('files')) === 0) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No files were uploaded',
                    'failed' => [['name' => 'No files', 'error' => 'Please select at least one image to upload']]
                ], 422);
            }
            return redirect()->back()->with('error', 'Please select at least one image to upload.');
        }

        try {
            $request->validate([
                'files.*' => 'required|file|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB max, images only
                'title.*' => 'nullable|string|max:255',
                'alt_text.*' => 'nullable|string|max:255',
                'description.*' => 'nullable|string',
                'tags.*' => 'nullable|string',
                'status.*' => 'nullable|boolean'
            ], [
                'files.*.required' => 'Please select an image to upload.',
                'files.*.file' => 'The uploaded item must be a valid file.',
                'files.*.mimes' => 'The file must be an image: jpeg, png, jpg, gif, or webp.',
                'files.*.max' => 'The file size must not exceed 10MB.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }

        $uploadedFiles = [];
        $failedFiles = [];

        if ($request->hasFile('files')) {
            // Ensure upload directory exists
            $uploadDir = public_path('uploads/library');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            foreach ($request->file('files') as $index => $file) {
                try {
                    // Check if file is valid first
                    if (!$file->isValid()) {
                        $failedFiles[] = [
                            'name' => $file->getClientOriginalName(),
                            'error' => 'File upload failed: ' . $this->getUploadErrorMessage($file->getError())
                        ];
                        continue;
                    }

                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . $index . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;
                    $path = 'uploads/library/' . $filename;
                    $fullPath = $uploadDir . '/' . $filename;

                    // Get image dimensions BEFORE moving the file (while temp file still exists)
                    $width = null;
                    $height = null;
                    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                        $tempPath = $file->getPathname();
                        if (file_exists($tempPath) && is_readable($tempPath)) {
                            $imageInfo = getimagesize($tempPath);
                            if ($imageInfo) {
                                $width = $imageInfo[0];
                                $height = $imageInfo[1];
                            }
                        }
                    }

                    // Store file using file_get_contents for better reliability
                    $fileContent = file_get_contents($file->getPathname());
                    if ($fileContent === false) {
                        throw new \Exception('Failed to read uploaded file');
                    }

                    // Write file content to destination
                    if (file_put_contents($fullPath, $fileContent) === false) {
                        throw new \Exception('Failed to save uploaded file');
                    }

                    // Handle tags
                    $tags = null;
                    if (!empty($request->tags[$index])) {
                        $tags = array_map('trim', explode(',', $request->tags[$index]));
                    }

                    // Get user ID
                    $userId = Auth::id();
                    if (!$userId) {
                        $firstUser = \App\Models\User::first();
                        $userId = $firstUser ? $firstUser->id : null;
                    }
                    
                    if (!$userId) {
                        throw new \Exception('No user found. Please ensure at least one user exists in the system.');
                    }

                    $imageData = [
                        'title' => $request->title[$index] ?? pathinfo($originalName, PATHINFO_FILENAME),
                        'filename' => $filename,
                        'original_name' => $originalName,
                        'path' => $path,
                        'url' => asset($path),
                        'mime_type' => $file->getMimeType(),
                        'size' => $file->getSize(),
                        'width' => $width,
                        'height' => $height,
                        'alt_text' => $request->alt_text[$index] ?? null,
                        'description' => $request->description[$index] ?? null,
                        'tags' => $tags,
                        'status' => isset($request->status[$index]) ? (bool)$request->status[$index] : true,
                        'user_id' => $userId
                    ];

                    $uploadedFiles[] = ImageLibrary::create($imageData);
                } catch (\Exception $e) {
                    $failedFiles[] = [
                        'name' => $file->getClientOriginalName() ?? 'Unknown file',
                        'error' => $e->getMessage()
                    ];
                }
            }
        }

        // Check if this is an AJAX request
        if ($request->ajax() || $request->wantsJson()) {
            if (count($uploadedFiles) > 0) {
                return response()->json([
                    'success' => true,
                    'message' => count($uploadedFiles) . ' image(s) uploaded successfully',
                    'uploaded' => collect($uploadedFiles)->map(function($file) {
                        return [
                            'id' => $file->id,
                            'title' => $file->title,
                            'filename' => $file->filename,
                            'url' => $file->url
                        ];
                    })->toArray(),
                    'failed' => $failedFiles
                ]);
            } else {
                $errorMessage = 'No images were uploaded successfully.';
                if (count($failedFiles) > 0) {
                    $errorMessage = $failedFiles[0]['error'] ?? $errorMessage;
                }
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'failed' => $failedFiles
                ], 422);
            }
        }

        // Regular form submission
        $message = count($uploadedFiles) === 1 
            ? 'Image uploaded successfully.' 
            : count($uploadedFiles) . ' images uploaded successfully.';

        if (count($failedFiles) > 0) {
            $message .= ' ' . count($failedFiles) . ' file(s) failed to upload.';
        }

        return redirect()->route('admin.content.image-upload.index')
            ->with('success', $message);
    }

    /**
     * Get upload error message
     */
    private function getUploadErrorMessage($errorCode)
    {
        $errors = [
            UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
            UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload',
        ];

        return $errors[$errorCode] ?? 'Unknown upload error';
    }

    public function edit(ImageLibrary $imageUpload)
    {
        return view('admin.content.image-upload.edit', compact('imageUpload'));
    }

    public function update(Request $request, ImageLibrary $imageUpload)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|string',
            'status' => 'boolean'
        ]);

        $data = $request->only(['title', 'alt_text', 'description', 'status']);

        // Handle tags
        if ($request->filled('tags')) {
            $data['tags'] = array_map('trim', explode(',', $request->tags));
        }

        $imageUpload->update($data);

        return redirect()->route('admin.content.image-upload.index')
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(ImageLibrary $imageUpload)
    {
        // Delete file from storage
        if (file_exists(public_path($imageUpload->path))) {
            unlink(public_path($imageUpload->path));
        }

        $imageUpload->delete();

        return redirect()->route('admin.content.image-upload.index')
            ->with('success', 'Image deleted successfully.');
    }

    public function toggleStatus(ImageLibrary $imageUpload)
    {
        $imageUpload->update(['status' => !$imageUpload->status]);

        return response()->json([
            'success' => true,
            'status' => $imageUpload->status
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:image_library,id'
        ]);

        $images = ImageLibrary::whereIn('id', $request->ids)
            ->where('mime_type', 'like', 'image/%')
            ->get();

        foreach ($images as $image) {
            if (file_exists(public_path($image->path))) {
                unlink(public_path($image->path));
            }
            $image->delete();
        }

        return response()->json([
            'success' => true,
            'message' => count($images) . ' image(s) deleted successfully.'
        ]);
    }
}
