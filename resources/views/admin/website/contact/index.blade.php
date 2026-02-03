@extends('admin.layouts.app')

@section('title', 'Contact Page Management')

@push('styles')
<style>
/* ========================================
   CONTACT PAGE MANAGEMENT STYLES
======================================== */
.contact-management-wrapper {
    padding: 20px;
    background: #f8f9fa;
    min-height: calc(100vh - 100px);
}

.contact-header {
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

.contact-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 28px;
}

.contact-header p {
    color: #6c757d;
    margin: 0;
    font-size: 14px;
}

.contact-form-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.contact-form-header {
    background: #f8f9fa;
    padding: 20px 25px;
    border-bottom: 1px solid #e9ecef;
}

.contact-form-header h4 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 18px;
    margin: 0 0 5px 0;
}

.contact-form-header p {
    color: #6c757d;
    margin: 0;
    font-size: 14px;
}

.contact-form-body {
    padding: 30px;
}

.section-card {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
    overflow: hidden;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.section-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.section-header {
    padding: 20px 25px;
    color: white;
    font-weight: 600;
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-header i {
    font-size: 18px;
}

.section-body {
    padding: 25px;
}

.section-header.bg-primary {
    background: linear-gradient(135deg, #007bff, #0056b3) !important;
}

.section-header.bg-success {
    background: linear-gradient(135deg, #28a745, #1e7e34) !important;
}

.section-header.bg-info {
    background: linear-gradient(135deg, #17a2b8, #138496) !important;
}

.section-header.bg-dark {
    background: linear-gradient(135deg, #343a40, #23272b) !important;
}

.section-header.bg-secondary {
    background: linear-gradient(135deg, #6c757d, #545b62) !important;
}

.section-header.bg-danger {
    background: linear-gradient(135deg, #dc3545, #c82333) !important;
}

.section-header.bg-light {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef) !important;
    color: #2c3e50 !important;
}

.section-header.bg-light i {
    color: #fe5716 !important;
}

.subsection-title {
    color: #fe5716;
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #fe5716;
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

.btn-update-contact {
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

.btn-update-contact:hover {
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

.form-check-input:checked {
    background-color: #fe5716;
    border-color: #fe5716;
}

.form-check-input:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15);
}

.form-check-label {
    color: #2c3e50;
    font-weight: 500;
}

/* Mobile Responsive Design */
@media (max-width: 768px) {
    .contact-management-wrapper {
        padding: 10px;
    }
    
    .contact-header {
        padding: 20px;
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
    
    .contact-header h1 {
        font-size: 24px;
    }
    
    .contact-form-body {
        padding: 20px;
    }
    
    .section-card {
        margin-bottom: 20px;
    }
    
    .section-header {
        padding: 15px 20px;
        font-size: 15px;
    }
    
    .section-body {
        padding: 20px;
    }
    
    .subsection-title {
        font-size: 15px;
        margin-bottom: 15px;
    }
    
    .form-control {
        padding: 10px 12px;
        font-size: 13px;
    }
    
    .btn-update-contact {
        padding: 12px 25px;
        font-size: 14px;
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .contact-management-wrapper {
        padding: 5px;
    }
    
    .contact-header {
        padding: 15px;
    }
    
    .contact-header h1 {
        font-size: 20px;
    }
    
    .contact-form-header {
        padding: 15px;
    }
    
    .contact-form-body {
        padding: 15px;
    }
    
    .section-header {
        padding: 12px 15px;
        font-size: 14px;
    }
    
    .section-body {
        padding: 15px;
    }
    
    .subsection-title {
        font-size: 14px;
        margin-bottom: 12px;
    }
    
    .form-control {
        padding: 8px 10px;
        font-size: 12px;
    }
    
    .btn-update-contact {
        padding: 10px 20px;
        font-size: 13px;
    }
}

/* Animation enhancements */
.contact-form-wrapper {
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

.section-card {
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

.form-control {
    animation: slideInLeft 0.4s ease-out;
}
</style>
@endpush

@section('content')
<div class="contact-management-wrapper">
    <!-- Page Header -->
    <div class="contact-header">
        <div>
            <h1><i class="fas fa-phone me-3"></i>Contact Page Management</h1>
            <p>Manage all content displayed on the contact page</p>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="contact-form-wrapper">
        <div class="contact-form-header">
            <h4><i class="fas fa-edit me-2"></i>Contact Page Configuration</h4>
            <p>Configure your contact page content, layout, and settings</p>
        </div>
        <div class="contact-form-body">
                    <form action="{{ route('admin.website.contact.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Page Header Section -->
                        <div class="section-card">
                            <div class="section-header bg-primary">
                                <i class="fas fa-heading"></i>
                                Page Header
                            </div>
                            <div class="section-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="page_title" class="form-label">Page Title</label>
                                                    <input type="text" class="form-control" id="page_title" name="page_title" 
                                                           value="{{ old('page_title', $contactSettings->page_title) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="page_subtitle" class="form-label">Page Subtitle</label>
                                                    <input type="text" class="form-control" id="page_subtitle" name="page_subtitle" 
                                                           value="{{ old('page_subtitle', $contactSettings->page_subtitle) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="banner_image" class="form-label">Banner Image</label>
                                            <input type="file" class="form-control" id="banner_image" name="banner_image" accept="image/*">
                                            @if($contactSettings->banner_image)
                                                <div class="current-image">
                                                    <img src="{{ Storage::url($contactSettings->banner_image) }}" alt="Current Banner" style="max-height: 100px;">
                                                </div>
                                            @endif
                                        </div>
                            </div>
                        </div>

                        <!-- Hero Section -->
                        <div class="section-card">
                            <div class="section-header bg-success">
                                <i class="fas fa-star"></i>
                                Hero Section
                            </div>
                            <div class="section-body">
                                        <div class="mb-3">
                                            <label for="hero_title" class="form-label">Hero Title</label>
                                            <input type="text" class="form-control" id="hero_title" name="hero_title" 
                                                   value="{{ old('hero_title', $contactSettings->hero_title) }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="hero_description" class="form-label">Hero Description</label>
                                            <textarea class="form-control" id="hero_description" name="hero_description" rows="3" required>{{ old('hero_description', $contactSettings->hero_description) }}</textarea>
                                        </div>
                            </div>
                        </div>

                        <!-- Contact Information Cards -->
                        <div class="section-card">
                            <div class="section-header bg-info">
                                <i class="fas fa-address-card"></i>
                                Contact Information
                            </div>
                            <div class="section-body">
                                        <div class="row">
                                            <!-- Email Section -->
                                            <div class="col-md-4">
                                                <h6 class="subsection-title">Email Information</h6>
                                                <div class="mb-3">
                                                    <label for="email_title" class="form-label">Email Title</label>
                                                    <input type="text" class="form-control" id="email_title" name="email_title" 
                                                           value="{{ old('email_title', $contactSettings->email_title) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email_address" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="email_address" name="email_address" 
                                                           value="{{ old('email_address', $contactSettings->email_address) }}" required>
                                                </div>
                                            </div>

                                            <!-- Phone Section -->
                                            <div class="col-md-4">
                                                <h6 class="subsection-title">Phone Information</h6>
                                                <div class="mb-3">
                                                    <label for="phone_title" class="form-label">Phone Title</label>
                                                    <input type="text" class="form-control" id="phone_title" name="phone_title" 
                                                           value="{{ old('phone_title', $contactSettings->phone_title) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone_number" class="form-label">Phone Number 1</label>
                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" 
                                                           value="{{ old('phone_number', $contactSettings->phone_number) }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone_number_2" class="form-label">Phone Number 2</label>
                                                    <input type="text" class="form-control" id="phone_number_2" name="phone_number_2" 
                                                           value="{{ old('phone_number_2', $contactSettings->phone_number_2) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone_subtitle" class="form-label">Phone Subtitle</label>
                                                    <input type="text" class="form-control" id="phone_subtitle" name="phone_subtitle" 
                                                           value="{{ old('phone_subtitle', $contactSettings->phone_subtitle) }}">
                                                </div>
                                            </div>

                                            <!-- Working Hours Section -->
                                            <div class="col-md-4">
                                                <h6 class="subsection-title">Working Hours</h6>
                                                <div class="mb-3">
                                                    <label for="hours_title" class="form-label">Hours Title</label>
                                                    <input type="text" class="form-control" id="hours_title" name="hours_title" 
                                                           value="{{ old('hours_title', $contactSettings->hours_title) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="working_hours_salt_lake" class="form-label">SALT LAKE Hours</label>
                                                    <input type="text" class="form-control" id="working_hours_salt_lake" name="working_hours_salt_lake" 
                                                           value="{{ old('working_hours_salt_lake', $contactSettings->working_hours_salt_lake) }}" 
                                                           placeholder="10.30 AM - 9.00 PM">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="working_hours_chingrighata" class="form-label">CHINGRIGHATA Hours</label>
                                                    <input type="text" class="form-control" id="working_hours_chingrighata" name="working_hours_chingrighata" 
                                                           value="{{ old('working_hours_chingrighata', $contactSettings->working_hours_chingrighata) }}" 
                                                           placeholder="9.00 AM - 10.00 PM">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="working_hours" class="form-label">Working Hours (Legacy)</label>
                                                    <input type="text" class="form-control" id="working_hours" name="working_hours" 
                                                           value="{{ old('working_hours', $contactSettings->working_hours) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="working_days" class="form-label">Working Days (Legacy)</label>
                                                    <input type="text" class="form-control" id="working_days" name="working_days" 
                                                           value="{{ old('working_days', $contactSettings->working_days) }}">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>

                        <!-- Office Locations -->
                        <div class="section-card">
                            <div class="section-header bg-dark">
                                <i class="fas fa-building"></i>
                                Office Locations
                            </div>
                            <div class="section-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="subsection-title">Office 1</h6>
                                                <div class="mb-3">
                                                    <label for="office1_title" class="form-label">Office 1 Title</label>
                                                    <input type="text" class="form-control" id="office1_title" name="office1_title" 
                                                           value="{{ old('office1_title', $contactSettings->office1_title) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="office1_address" class="form-label">Office 1 Address</label>
                                                    <textarea class="form-control" id="office1_address" name="office1_address" rows="3" required>{{ old('office1_address', $contactSettings->office1_address) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="subsection-title">Office 2</h6>
                                                <div class="mb-3">
                                                    <label for="office2_title" class="form-label">Office 2 Title</label>
                                                    <input type="text" class="form-control" id="office2_title" name="office2_title" 
                                                           value="{{ old('office2_title', $contactSettings->office2_title) }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="office2_address" class="form-label">Office 2 Address</label>
                                                    <textarea class="form-control" id="office2_address" name="office2_address" rows="3" required>{{ old('office2_address', $contactSettings->office2_address) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>

                        <!-- Contact Form Section -->
                        <div class="section-card">
                            <div class="section-header bg-secondary">
                                <i class="fas fa-wpforms"></i>
                                Contact Form Settings
                            </div>
                            <div class="section-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="form_title" class="form-label">Form Title</label>
                                                    <input type="text" class="form-control" id="form_title" name="form_title" 
                                                           value="{{ old('form_title', $contactSettings->form_title) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="form_textarea_placeholder" class="form-label">Textarea Placeholder</label>
                                                    <input type="text" class="form-control" id="form_textarea_placeholder" name="form_textarea_placeholder" 
                                                           value="{{ old('form_textarea_placeholder', $contactSettings->form_textarea_placeholder) }}">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>

                        <!-- Awards Section -->
                        <div class="section-card">
                            <div class="section-header bg-danger">
                                <i class="fas fa-trophy"></i>
                                Awards Section
                            </div>
                            <div class="section-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="awards_title" class="form-label">Awards Section Title</label>
                                                    <input type="text" class="form-control" id="awards_title" name="awards_title" 
                                                           value="{{ old('awards_title', $contactSettings->awards_title) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" type="checkbox" id="show_awards" name="show_awards" 
                                                           {{ old('show_awards', $contactSettings->show_awards) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="show_awards">
                                                        Show Awards Section
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>

                        <!-- Page Status -->
                        <div class="section-card">
                            <div class="section-header bg-light">
                                <i class="fas fa-cog"></i>
                                Page Settings
                            </div>
                            <div class="section-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   {{ old('is_active', $contactSettings->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Page is Active
                                            </label>
                                        </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-update-contact">
                                    <i class="fas fa-save"></i> Update Contact Page
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
// Enhanced contact page management interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth animations to form elements
    const formElements = document.querySelectorAll('.form-control');
    formElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.05}s`;
    });

    // Add animations to section cards
    const sectionCards = document.querySelectorAll('.section-card');
    sectionCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
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
                        <img src="${e.target.result}" alt="Preview" style="max-height: 100px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
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
            const submitBtn = form.querySelector('.btn-update-contact');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
            submitBtn.disabled = true;
        });
    }

    // Add hover effects to section cards
    sectionCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

// Add CSS for file preview and enhanced animations
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
    
    .section-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .section-header {
        transition: all 0.3s ease;
    }
    
    .section-card:hover .section-header {
        transform: scale(1.02);
    }
`;
document.head.appendChild(style);
</script>
@endpush
