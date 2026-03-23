<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoUploadController extends Controller
{
    public function index(Request $request)
    {
        $query = ImageLibrary::with('user')
            ->where('mime_type', 'like', 'video/%');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('original_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status === 'active');
        }

        // Video gallery tag filter
        if ($request->filled('gallery')) {
            if ($request->gallery === 'tagged') {
                $query->whereJsonContains('tags', 'video-gallery');
            } elseif ($request->gallery === 'not-tagged') {
                $query->where(function($q) {
                    $q->whereJsonDoesntContain('tags', 'video-gallery')
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

        $videos = $query->paginate(24)->withQueryString();

        return view('admin.content.video-upload.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.content.video-upload.create');
    }

    public function store(Request $request)
    {
        // Validate that files are present
        if (!$request->hasFile('files') || count($request->file('files')) === 0) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No files were uploaded',
                    'failed' => [['name' => 'No files', 'error' => 'Please select at least one video to upload']]
                ], 422);
            }
            return redirect()->back()->with('error', 'Please select at least one video to upload.');
        }

        try {
            $request->validate([
                'files.*' => 'required|file|mimes:mp4,webm,ogg,mov,avi|max:102400', // 100MB max, videos only
                'title.*' => 'nullable|string|max:255',
                'description.*' => 'nullable|string',
                'tags.*' => 'nullable|string',
                'status.*' => 'nullable|boolean'
            ], [
                'files.*.required' => 'Please select a video to upload.',
                'files.*.file' => 'The uploaded item must be a valid file.',
                'files.*.mimes' => 'The file must be a video: mp4, webm, ogg, mov, or avi.',
                'files.*.max' => 'The file size must not exceed 100MB.'
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
            foreach ($request->file('files') as $index => $file) {
                try {
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . $index . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;
                    $path = 'uploads/library/' . $filename;

                    // Store file
                    $file->move(public_path('uploads/library'), $filename);

                    // Handle tags
                    $tags = null;
                    if (!empty($request->tags[$index])) {
                        $tags = array_map('trim', explode(',', $request->tags[$index]));
                    }

                    $videoData = [
                        'title' => $request->title[$index] ?? pathinfo($originalName, PATHINFO_FILENAME),
                        'filename' => $filename,
                        'original_name' => $originalName,
                        'path' => $path,
                        'url' => asset($path),
                        'mime_type' => $file->getMimeType(),
                        'size' => $file->getSize(),
                        'width' => null,
                        'height' => null,
                        'alt_text' => null,
                        'description' => $request->description[$index] ?? null,
                        'tags' => $tags,
                        'status' => isset($request->status[$index]) ? (bool)$request->status[$index] : true,
                        'user_id' => Auth::id() ?: (\App\Models\User::first()->id ?? null)
                    ];

                    $uploadedFiles[] = ImageLibrary::create($videoData);
                } catch (\Exception $e) {
                    $failedFiles[] = [
                        'name' => $file->getClientOriginalName(),
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
                    'message' => count($uploadedFiles) . ' video(s) uploaded successfully',
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
                $errorMessage = 'No videos were uploaded successfully.';
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
            ? 'Video uploaded successfully.' 
            : count($uploadedFiles) . ' videos uploaded successfully.';

        if (count($failedFiles) > 0) {
            $message .= ' ' . count($failedFiles) . ' file(s) failed to upload.';
        }

        return redirect()->route('admin.content.video-upload.index')
            ->with('success', $message);
    }

    public function edit(ImageLibrary $videoUpload)
    {
        return view('admin.content.video-upload.edit', compact('videoUpload'));
    }

    public function update(Request $request, ImageLibrary $videoUpload)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|string',
            'status' => 'boolean'
        ]);

        $data = $request->only(['title', 'description', 'status']);

        // Handle tags
        if ($request->filled('tags')) {
            $data['tags'] = array_map('trim', explode(',', $request->tags));
        }

        $videoUpload->update($data);

        return redirect()->route('admin.content.video-upload.index')
            ->with('success', 'Video updated successfully.');
    }

    public function destroy(ImageLibrary $videoUpload)
    {
        // Delete file from storage
        if (file_exists(public_path($videoUpload->path))) {
            unlink(public_path($videoUpload->path));
        }

        $videoUpload->delete();

        return redirect()->route('admin.content.video-upload.index')
            ->with('success', 'Video deleted successfully.');
    }

    public function toggleStatus(ImageLibrary $videoUpload)
    {
        $videoUpload->update(['status' => !$videoUpload->status]);

        return response()->json([
            'success' => true,
            'status' => $videoUpload->status
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:image_library,id'
        ]);

        $videos = ImageLibrary::whereIn('id', $request->ids)
            ->where('mime_type', 'like', 'video/%')
            ->get();

        foreach ($videos as $video) {
            if (file_exists(public_path($video->path))) {
                unlink(public_path($video->path));
            }
            $video->delete();
        }

        return response()->json([
            'success' => true,
            'message' => count($videos) . ' video(s) deleted successfully.'
        ]);
    }
}
