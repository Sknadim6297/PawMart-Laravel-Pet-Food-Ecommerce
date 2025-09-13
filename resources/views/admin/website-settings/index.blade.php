@extends('admin.layouts.app')

@section('title', 'Website Settings')

@push('styles')
<style>
/* ========================================
   WEBSITE SETTINGS STYLES
======================================== */
.settings-management-wrapper {
    padding: 20px;
    background: #f8f9fa;
    min-height: calc(100vh - 100px);
}

.settings-header {
    background: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    border-left: 4px solid #fe5716;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.settings-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 28px;
}

.settings-header p {
    color: #6c757d;
    margin: 0;
    font-size: 14px;
}

.settings-form-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.settings-form-header {
    background: #f8f9fa;
    padding: 20px 25px;
    border-bottom: 1px solid #e9ecef;
}

.settings-form-header h4 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 18px;
    margin: 0 0 5px 0;
}

.settings-form-header p {
    color: #6c757d;
    margin: 0;
    font-size: 14px;
}

.settings-form-body {
    padding: 30px;
}

.section-title {
    color: #2c3e50;
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 20px;
    padding: 15px 20px;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 10px;
    border-left: 4px solid #fe5716;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title i {
    color: #fe5716;
    font-size: 18px;
}

.form-label {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: #ffffff;
}

.form-control:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15);
    background: #ffffff;
}

.form-control::placeholder {
    color: #adb5bd;
    font-style: italic;
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
}

.btn-save-settings {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-save-settings:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
}

.current-image {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 10px;
    background: #f8f9fa;
    margin-top: 10px;
}

.current-image img {
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.current-image small {
    color: #6c757d;
    font-weight: 500;
    margin-top: 5px;
    display: block;
}

.alert {
    border-radius: 10px;
    border: none;
    padding: 15px 20px;
    margin-bottom: 25px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.alert-success {
    background: linear-gradient(135deg, #d1f2eb, #a3e4d7);
    color: #00695c;
    border-left: 4px solid #00b894;
}

.alert-danger {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    color: #721c24;
    border-left: 4px solid #e74c3c;
}

.text-danger {
    color: #e74c3c !important;
    font-size: 12px;
    font-weight: 500;
    margin-top: 5px;
}

/* Mobile Responsive Design */
@media (max-width: 768px) {
    .settings-management-wrapper {
        padding: 10px;
    }
    
    .settings-header {
        padding: 20px;
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
    
    .settings-header h1 {
        font-size: 24px;
    }
    
    .settings-form-body {
        padding: 20px;
    }
    
    .section-title {
        font-size: 15px;
        padding: 12px 15px;
        margin-bottom: 15px;
    }
    
    .form-control {
        padding: 10px 12px;
        font-size: 13px;
    }
    
    .btn-save-settings {
        padding: 12px 25px;
        font-size: 14px;
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .settings-management-wrapper {
        padding: 5px;
    }
    
    .settings-header {
        padding: 15px;
    }
    
    .settings-header h1 {
        font-size: 20px;
    }
    
    .settings-form-header {
        padding: 15px;
    }
    
    .settings-form-body {
        padding: 15px;
    }
    
    .section-title {
        font-size: 14px;
        padding: 10px 12px;
    }
    
    .form-control {
        padding: 8px 10px;
        font-size: 12px;
    }
    
    .btn-save-settings {
        padding: 10px 20px;
        font-size: 13px;
    }
}

/* Animation enhancements */
.settings-form-wrapper {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-control {
    animation: slideInLeft 0.4s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>
@endpush

@section('content')
<div class="settings-management-wrapper">
    <!-- Page Header -->
    <div class="settings-header">
        <div>
            <h1><i class="fas fa-cog me-3"></i>Website Settings</h1>
            <p>Manage your website's global settings, branding, and contact information</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Settings Form -->
    <div class="settings-form-wrapper">
        <div class="settings-form-header">
            <h4><i class="fas fa-globe me-2"></i>Website Configuration</h4>
            <p>Configure your website's appearance, contact details, and social media presence</p>
        </div>
        <div class="settings-form-body">
                    <form action="{{ route('admin.website.settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Company Information Section -->
                        <div class="section-title">
                            <i class="fas fa-building"></i>
                            Company Information
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="company_name" class="form-label">Company Name *</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" 
                                       value="{{ $settings->company_name ?? '' }}" required>
                                @error('company_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="company_description" class="form-label">Company Description</label>
                                <input type="text" class="form-control" id="company_description" name="company_description" 
                                       value="{{ $settings->company_description ?? '' }}" placeholder="Your company description">
                                @error('company_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ $settings->email ?? '' }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" 
                                       value="{{ $settings->phone ?? '' }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3">{{ $settings->address ?? '' }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Branding Section -->
                        <div class="section-title">
                            <i class="fas fa-palette"></i>
                            Branding & Logo
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="company_logo" class="form-label">Main Logo</label>
                                <input type="file" class="form-control" id="company_logo" name="company_logo" accept="image/*">
                                @if($settings->company_logo)
                                    <div class="current-image">
                                        <img src="{{ asset('storage/' . $settings->company_logo) }}" alt="Logo" style="max-height: 60px;">
                                        <small>Current Logo</small>
                                    </div>
                                @endif
                                @error('company_logo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="company_logo_white" class="form-label">White/Footer Logo</label>
                                <input type="file" class="form-control" id="company_logo_white" name="company_logo_white" accept="image/*">
                                @if($settings->company_logo_white)
                                    <div class="current-image">
                                        <img src="{{ asset('storage/' . $settings->company_logo_white) }}" alt="White Logo" style="max-height: 60px;">
                                        <small>Current White Logo</small>
                                    </div>
                                @endif
                                @error('company_logo_white')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Social Media Section -->
                        <div class="section-title">
                            <i class="fas fa-share-alt"></i>
                            Social Media Links
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="facebook_url" class="form-label">Facebook URL</label>
                                <input type="url" class="form-control" id="facebook_url" name="facebook_url" 
                                       value="{{ $settings->facebook_url ?? '' }}" placeholder="https://facebook.com/yourpage">
                                @error('facebook_url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="twitter_url" class="form-label">Twitter URL</label>
                                <input type="url" class="form-control" id="twitter_url" name="twitter_url" 
                                       value="{{ $settings->twitter_url ?? '' }}" placeholder="https://twitter.com/yourhandle">
                                @error('twitter_url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="instagram_url" class="form-label">Instagram URL</label>
                                <input type="url" class="form-control" id="instagram_url" name="instagram_url" 
                                       value="{{ $settings->instagram_url ?? '' }}" placeholder="https://instagram.com/yourhandle">
                                @error('instagram_url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="instagram_handle" class="form-label">Instagram Handle</label>
                                <input type="text" class="form-control" id="instagram_handle" name="instagram_handle" 
                                       value="{{ $settings->instagram_handle ?? '' }}" placeholder="@yourhandle">
                                @error('instagram_handle')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                                <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" 
                                       value="{{ $settings->linkedin_url ?? '' }}" placeholder="https://linkedin.com/company/yourcompany">
                                @error('linkedin_url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="youtube_url" class="form-label">YouTube URL</label>
                                <input type="url" class="form-control" id="youtube_url" name="youtube_url" 
                                       value="{{ $settings->youtube_url ?? '' }}" placeholder="https://youtube.com/c/yourchannel">
                                @error('youtube_url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Footer Settings Section -->
                        <div class="section-title">
                            <i class="fas fa-window-maximize"></i>
                            Footer Settings
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="footer_description" class="form-label">Footer Description</label>
                                <textarea class="form-control" id="footer_description" name="footer_description" rows="4" 
                                          placeholder="Brief description about your company for the footer">{{ $settings->footer_description ?? '' }}</textarea>
                                @error('footer_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="footer_copyright" class="form-label">Copyright Text</label>
                                <input type="text" class="form-control" id="footer_copyright" name="footer_copyright" 
                                       value="{{ $settings->footer_copyright ?? '' }}" placeholder="© 2024 Your Company. All rights reserved.">
                                @error('footer_copyright')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="support_text" class="form-label">Support Text</label>
                                <input type="text" class="form-control" id="support_text" name="support_text" 
                                       value="{{ $settings->support_text ?? '' }}" placeholder="Got Questions? Call us 24/7">
                                @error('support_text')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="working_hours_weekdays" class="form-label">Weekdays</label>
                                <input type="text" class="form-control" id="working_hours_weekdays" name="working_hours_weekdays" 
                                       value="{{ $settings->working_hours_weekdays ?? '' }}" placeholder="Monday - Saturday">
                                @error('working_hours_weekdays')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="working_hours_weekdays_time" class="form-label">Weekdays Time</label>
                                <input type="text" class="form-control" id="working_hours_weekdays_time" name="working_hours_weekdays_time" 
                                       value="{{ $settings->working_hours_weekdays_time ?? '' }}" placeholder="08AM - 10PM">
                                @error('working_hours_weekdays_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="working_hours_weekend" class="form-label">Weekend</label>
                                <input type="text" class="form-control" id="working_hours_weekend" name="working_hours_weekend" 
                                       value="{{ $settings->working_hours_weekend ?? '' }}" placeholder="Sunday">
                                @error('working_hours_weekend')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="working_hours_weekend_time" class="form-label">Weekend Time</label>
                                <input type="text" class="form-control" id="working_hours_weekend_time" name="working_hours_weekend_time" 
                                       value="{{ $settings->working_hours_weekend_time ?? '' }}" placeholder="08AM - 10PM">
                                @error('working_hours_weekend_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-save-settings">
                                    <i class="fas fa-save"></i> Save Settings
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Enhanced website settings interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth animations to form elements
    const formElements = document.querySelectorAll('.form-control');
    formElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.05}s`;
    });

    // Enhanced file input preview
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create or update preview
                    let preview = input.parentNode.querySelector('.file-preview');
                    if (!preview) {
                        preview = document.createElement('div');
                        preview.className = 'file-preview mt-2';
                        input.parentNode.appendChild(preview);
                    }
                    preview.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" style="max-height: 60px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                        <small class="text-muted d-block mt-1">New file selected</small>
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // Form validation enhancement
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('.btn-save-settings');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
            submitBtn.disabled = true;
        });
    }
});

// Add CSS for file preview
const style = document.createElement('style');
style.textContent = `
    .file-preview {
        animation: fadeInUp 0.4s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .form-control:focus {
        transform: translateY(-1px);
        box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15), 0 4px 12px rgba(254, 87, 22, 0.1);
    }
`;
document.head.appendChild(style);
</script>
@endpush
