@extends('frontend.layouts.layout')

@section('title', 'Forgot Password - Animal Pride')

@push('styles')
<style>
.forgot-password-section {
    min-height: 100vh;
    background: linear-gradient(135deg, #fff8e5 0%, #ffe8cc 100%);
    background-image: url({{ asset('assets/img/banner.png') }});
    background-size: cover;
    background-position: center;
    background-blend-mode: overlay;
    padding: 60px 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.forgot-password-container {
    max-width: 500px;
    width: 100%;
}

.forgot-password-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    animation: slideUp 0.6s ease-out;
    margin-top: 140px;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.forgot-password-header {
    background: linear-gradient(135deg, #fe5716 0%, #ff7a3d 100%);
    padding: 30px;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
}

.forgot-password-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: pulse 3s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        opacity: 0.5;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.8;
    }
}

.forgot-password-header h3 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    position: relative;
    z-index: 1;
}

.forgot-password-header .icon-wrapper {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    position: relative;
    z-index: 1;
    backdrop-filter: blur(10px);
}

.forgot-password-header .icon-wrapper i {
    font-size: 36px;
    color: white;
}

.forgot-password-body {
    padding: 40px;
}

.info-alert {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border: none;
    border-left: 4px solid #2196f3;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 25px;
    color: #1565c0;
    font-size: 14px;
    line-height: 1.6;
    box-shadow: 0 2px 8px rgba(33, 150, 243, 0.1);
}

.info-alert i {
    font-size: 20px;
    margin-right: 10px;
    vertical-align: middle;
}

.alert-success {
    background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
    border: none;
    border-left: 4px solid #4caf50;
    border-radius: 12px;
    padding: 15px 20px;
    margin-bottom: 20px;
    color: #2e7d32;
    box-shadow: 0 2px 8px rgba(76, 175, 80, 0.1);
}

.alert-danger {
    background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
    border: none;
    border-left: 4px solid #f44336;
    border-radius: 12px;
    padding: 15px 20px;
    margin-bottom: 20px;
    color: #c62828;
    box-shadow: 0 2px 8px rgba(244, 67, 54, 0.1);
}

.form-group {
    margin-bottom: 25px;
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
    display: block;
    font-size: 14px;
}

.form-label i {
    color: #fe5716;
    margin-right: 8px;
}

.form-control {
    width: 100%;
    padding: 14px 18px;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    font-size: 15px;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.form-control:focus {
    outline: none;
    border-color: #fe5716;
    background: #ffffff;
    box-shadow: 0 0 0 4px rgba(254, 87, 22, 0.1);
}

.form-control.is-invalid {
    border-color: #f44336;
    background: #fff5f5;
}

.invalid-feedback {
    color: #f44336;
    font-size: 13px;
    margin-top: 8px;
    display: block;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-top: 30px;
    flex-wrap: wrap;
}

.btn-back {
    background: #f8f9fa;
    color: #495057;
    border: 2px solid #e9ecef;
    padding: 12px 24px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-back:hover {
    background: #e9ecef;
    color: #212529;
    border-color: #dee2e6;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-decoration: none;
}

.btn-submit {
    background: linear-gradient(135deg, #fe5716 0%, #ff7a3d 100%);
    color: white;
    border: none;
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #e54e14 0%, #fe5716 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.4);
}

.btn-submit:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.btn-submit i {
    font-size: 16px;
}

.btn-close {
    background: transparent;
    border: none;
    font-size: 20px;
    opacity: 0.7;
    cursor: pointer;
    padding: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.btn-close:hover {
    opacity: 1;
    background: rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .forgot-password-section {
        padding: 40px 15px;
    }
    
    .forgot-password-body {
        padding: 30px 20px;
    }
    
    .forgot-password-header {
        padding: 25px 20px;
    }
    
    .forgot-password-header h3 {
        font-size: 24px;
    }
    
    .forgot-password-header .icon-wrapper {
        width: 70px;
        height: 70px;
    }
    
    .forgot-password-header .icon-wrapper i {
        font-size: 30px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-back,
    .btn-submit {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .forgot-password-header h3 {
        font-size: 20px;
    }
    
    .info-alert {
        padding: 15px;
        font-size: 13px;
    }
}
</style>
@endpush

@section('content')
<section class="forgot-password-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 forgot-password-container">
                <div class="forgot-password-card">
                    <div class="forgot-password-header">
                        <div class="icon-wrapper">
                            <i class="fas fa-key"></i>
                        </div>
                        <h3>Reset Password</h3>
                    </div>
                    <div class="forgot-password-body">
                        <div class="info-alert">
                            <i class="fas fa-info-circle"></i>
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success fade show">
                                <i class="fas fa-check-circle"></i>
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="fas fa-exclamation-circle"></i>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" id="forgotPasswordForm">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope"></i> {{ __('Email') }}
                                </label>
                                <input id="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       type="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autofocus 
                                       placeholder="Enter your email address">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-actions">
                                <a href="{{ route('login') }}" class="btn-back">
                                    <i class="fas fa-arrow-left"></i> Back to Login
                                </a>
                                <button type="submit" class="btn-submit" id="submitBtn">
                                    <i class="fas fa-paper-plane"></i>
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('forgotPasswordForm');
    const submitBtn = document.getElementById('submitBtn');
    const emailInput = document.getElementById('email');
    
    form.addEventListener('submit', function(e) {
        // Basic email validation
        const email = emailInput.value.trim();
        if (!email || !isValidEmail(email)) {
            e.preventDefault();
            showAlert('Please enter a valid email address.', 'danger');
            emailInput.focus();
            return false;
        }
        
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        
        // Re-enable button after 10 seconds to prevent permanent disabled state
        setTimeout(function() {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> {{ __('Email Password Reset Link') }}';
        }, 10000);
    });
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    function showAlert(message, type) {
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                <i class="fas fa-${type === 'danger' ? 'exclamation-circle' : 'info-circle'}"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        
        // Remove existing alerts (except info alert)
        const existingAlerts = document.querySelectorAll('.alert-success, .alert-danger');
        existingAlerts.forEach(alert => alert.remove());
        
        // Insert new alert at the top of the form body
        const formBody = document.querySelector('.forgot-password-body');
        const infoAlert = formBody.querySelector('.info-alert');
        if (infoAlert) {
            infoAlert.insertAdjacentHTML('afterend', alertHtml);
        } else {
            formBody.insertAdjacentHTML('afterbegin', alertHtml);
        }
        
        // Auto-dismiss after 5 seconds
        setTimeout(function() {
            const newAlert = formBody.querySelector('.alert-' + type);
            if (newAlert) {
                newAlert.style.transition = 'opacity 0.3s ease';
                newAlert.style.opacity = '0';
                setTimeout(function() {
                    newAlert.remove();
                }, 300);
            }
        }, 5000);
    }
    
    // Add input focus effects
    emailInput.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
    });
    
    emailInput.addEventListener('blur', function() {
        this.parentElement.classList.remove('focused');
    });
});
</script>
@endpush
@endsection
