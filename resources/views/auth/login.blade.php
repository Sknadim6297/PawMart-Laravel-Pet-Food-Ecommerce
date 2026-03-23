@php
use Illuminate\Support\Facades\Route;
@endphp

@extends('frontend.layouts.layout')

@section('style')
<style>
.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
}

.is-invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + 0.75rem);
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='m5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.alert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.mb-4 {
    margin-bottom: 1.5rem;
}

/* Header dropdown styles */
.login .dropdown {
    position: relative;
}

.login .dropdown-toggle {
    text-decoration: none;
    color: inherit;
    cursor: pointer;
}

.login .dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 1000;
    display: none;
    min-width: 160px;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    font-size: 0.875rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 0.375rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175);
}

.login .dropdown:hover .dropdown-menu {
    display: block;
}

.login .dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    text-decoration: none;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    cursor: pointer;
}

.login .dropdown-item:hover,
.login .dropdown-item:focus {
    color: #16181b;
    background-color: #f8f9fa;
}

.login .dropdown-divider {
    height: 0;
    margin: 0.5rem 0;
    overflow: hidden;
    border-top: 1px solid #e9ecef;
}
</style>
@endsection

@section('content')
<section class="banner" style="background-color: #fff8e5; background-image:url({{ asset('assets/img/banner.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>Login</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img">
                    <div class="banner-img-1">
                        <svg width="260" height="260" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                        </svg>
                        <img src="{{ asset('assets/img/banner-img-1.jpg') }}" alt="banner">
                    </div>
                    <div class="banner-img-2">
                        <svg width="320" height="320" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                        </svg>
                        <img src="{{ asset('assets/img/banner-img-2.jpg') }}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gap">
   <div class="container">
      <!-- Session Status -->
      @if (session('status'))
          <div class="alert alert-success mb-4">
              {{ session('status') }}
          </div>
      @endif

      <!-- Unified Top Error Summary -->
      @if ($errors->any())
          <div class="alert alert-danger mb-4" id="error-summary">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @else
          <div class="alert alert-danger mb-4" id="error-summary" style="display:none"></div>
      @endif

      <div class="row">
        <div class="col-lg-6">
          <div class="box login">
            <h3>Log In Your Account</h3>

            <form method="POST" action="{{ route('login') }}">
              @csrf
              
              <!-- Hidden field for intended URL -->
              @if(session('url.intended'))
                  <input type="hidden" name="intended_url" value="{{ session('url.intended') }}">
              @elseif(request('redirect'))
                  <input type="hidden" name="intended_url" value="{{ request('redirect') }}">
              @endif
              
            <!-- Email or Mobile Number -->
            <input type="text" 
                name="login" 
                value="{{ old('login') }}" 
                placeholder="Email or mobile number" 
                required 
                autofocus 
                autocomplete="username">

              <!-- Password -->
              <input type="password" 
                     name="password" 
                     placeholder="Password" 
                     required 
                     autocomplete="current-password">

              <div class="remember">
                <div class="first">
                  <input type="checkbox" name="remember" id="remember_me">
                  <label for="remember_me">Remember me</label>
                </div>
                <div class="second">
                  @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}">Forgot Password?</a>
                  @endif
                </div>
              </div>
              <button type="submit" class="button">Login</button>
            </form>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="box register">
            <div class="parallax" style="background-image: url({{ asset('assets/img/patron.html') }})"></div>
            <h3>Create Your Account</h3>
            
            <form method="POST" action="{{ route('register') }}">
              @csrf
              
              <!-- Hidden field for intended URL -->
              @if(session('url.intended'))
                  <input type="hidden" name="intended_url" value="{{ session('url.intended') }}">
              @elseif(request('redirect'))
                  <input type="hidden" name="intended_url" value="{{ request('redirect') }}">
              @endif
              
              <!-- Name -->
              <input type="text" 
                     name="name" 
                     value="{{ old('name') }}" 
                     placeholder="Complete Name" 
                     required 
                     autofocus 
                     autocomplete="name">

            <!-- Mobile Number -->
            <input type="text" 
                name="phone" 
                value="{{ old('phone') }}" 
                placeholder="Mobile number" 
                required 
                autocomplete="tel">

              <!-- Email Address -->
              <input type="email" 
                     name="email" 
                     value="{{ old('email') }}" 
                     placeholder="Email address" 
                     required 
                     autocomplete="username">

              <!-- Password -->
              <input type="password" 
                     name="password" 
                     placeholder="Password" 
                     required 
                     autocomplete="new-password">

              <!-- Confirm Password -->
              <input type="password" 
                     name="password_confirmation" 
                     placeholder="Confirm Password" 
                     required 
                     autocomplete="new-password">

              <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
              <button type="submit" class="button">Register</button>
            </form>
          </div>
        </div>
      </div>
   </div>
</section>
@endsection

@section('script')
<script>
// Top error summaries and live client-side validation
document.addEventListener('DOMContentLoaded', function() {
    // Preserve intended redirect for login
    const intendedUrl = sessionStorage.getItem('intendedUrl');
    const loginForm = document.querySelector('form[action*="login"]');
    if (loginForm && intendedUrl) {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'intended_url';
        hiddenInput.value = intendedUrl;
        loginForm.appendChild(hiddenInput);
        sessionStorage.removeItem('intendedUrl');
    }

    const registerForm = document.querySelector('form[action*="register"]');

    function emailValid(value) {
        // Simple RFC-like check
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
    }

    function setFieldError(input, message) {
        let feedback = input.nextElementSibling;
        const hasFeedback = feedback && feedback.classList && feedback.classList.contains('invalid-feedback');
        if (message) {
            input.classList.add('is-invalid');
            if (!hasFeedback) {
                feedback = document.createElement('div');
                feedback.className = 'invalid-feedback';
                input.insertAdjacentElement('afterend', feedback);
            }
            feedback.textContent = message;
        } else {
            input.classList.remove('is-invalid');
            if (hasFeedback) feedback.textContent = '';
        }
    }

    let serverErrors = [];

    function getServerErrors() {
        const container = document.getElementById('error-summary');
        if (!container || !container.querySelector('ul')) return [];
        const listItems = container.querySelectorAll('ul li');
        return Array.from(listItems).map(li => li.textContent);
    }

    function showSummary(clientMessages) {
        const container = document.getElementById('error-summary');
        if (!container) return;
        
        // Combine server errors and client validation messages
        const allMessages = [...new Set([...serverErrors, ...clientMessages])];
        
        if (allMessages.length) {
            container.style.display = '';
            container.innerHTML = '<ul>' + allMessages.map(m => '<li>' + m.replace(/</g,'&lt;') + '</li>').join('') + '</ul>';
        } else {
            container.style.display = 'none';
            container.innerHTML = '';
        }
    }

    function validateLoginForm() {
        if (!loginForm) return [];
        const loginInput = loginForm.querySelector('input[name="login"]');
        const passwordInput = loginForm.querySelector('input[name="password"]');
        const messages = [];

        if (loginInput) {
            const v = loginInput.value.trim();
            if (!v) {
                messages.push('Email or mobile number is required.');
                setFieldError(loginInput, 'Email or mobile number is required.');
            } else if (v.includes('@')) {
                if (!emailValid(v)) {
                    messages.push('Please enter a valid email address.');
                    setFieldError(loginInput, 'Please enter a valid email address.');
                } else {
                    setFieldError(loginInput, '');
                }
            } else {
                const phoneValid = /^\d{10,15}$/.test(v);
                if (!phoneValid) {
                    messages.push('Please enter a valid mobile number.');
                    setFieldError(loginInput, 'Please enter a valid mobile number.');
                } else {
                    setFieldError(loginInput, '');
                }
            }
        }

        if (passwordInput) {
            const v = passwordInput.value;
            if (!v) {
                messages.push('Password is required.');
                setFieldError(passwordInput, 'Password is required.');
            } else if (v.length < 6) {
                messages.push('The password field must be at least 6 characters.');
                setFieldError(passwordInput, 'The password field must be at least 6 characters.');
            } else {
                setFieldError(passwordInput, '');
            }
        }

        showSummary(messages);
        return messages;
    }

    function validateRegisterForm() {
        if (!registerForm) return [];
        const nameInput = registerForm.querySelector('input[name="name"]');
        const phoneInput = registerForm.querySelector('input[name="phone"]');
        const emailInput = registerForm.querySelector('input[name="email"]');
        const passwordInput = registerForm.querySelector('input[name="password"]');
        const confirmInput = registerForm.querySelector('input[name="password_confirmation"]');
        const messages = [];

        if (nameInput) {
            const v = nameInput.value.trim();
            if (!v) {
                messages.push('Name is required.');
                setFieldError(nameInput, 'Name is required.');
            } else {
                setFieldError(nameInput, '');
            }
        }
        if (emailInput) {
            const v = emailInput.value.trim();
            if (!v) {
                messages.push('Email is required.');
                setFieldError(emailInput, 'Email is required.');
            } else if (!emailValid(v)) {
                messages.push('Please enter a valid email address.');
                setFieldError(emailInput, 'Please enter a valid email address.');
            } else {
                setFieldError(emailInput, '');
            }
        }
        if (phoneInput) {
            const v = phoneInput.value.trim();
            if (!v) {
                messages.push('Mobile number is required.');
                setFieldError(phoneInput, 'Mobile number is required.');
            } else if (!/^\d{10,15}$/.test(v)) {
                messages.push('Please enter a valid mobile number.');
                setFieldError(phoneInput, 'Please enter a valid mobile number.');
            } else {
                setFieldError(phoneInput, '');
            }
        }
        if (passwordInput) {
            const v = passwordInput.value;
            if (!v) {
                messages.push('Password is required.');
                setFieldError(passwordInput, 'Password is required.');
            } else if (v.length < 6) {
                messages.push('The password field must be at least 6 characters.');
                setFieldError(passwordInput, 'The password field must be at least 6 characters.');
            } else {
                setFieldError(passwordInput, '');
            }
        }
        if (confirmInput && passwordInput) {
            if (confirmInput.value !== passwordInput.value) {
                messages.push('Password confirmation does not match.');
                setFieldError(confirmInput, 'Password confirmation does not match.');
            } else {
                setFieldError(confirmInput, '');
            }
        }

        showSummary(messages);
        return messages;
    }

    // Preserve server-side errors on page load
    serverErrors = getServerErrors();

    // Attach listeners
    [loginForm?.querySelector('input[name="login"]'), loginForm?.querySelector('input[name="password"]')]
        .filter(Boolean).forEach(inp => inp.addEventListener('input', validateLoginForm));
    [registerForm?.querySelector('input[name="name"]'), registerForm?.querySelector('input[name="phone"]'), registerForm?.querySelector('input[name="email"]'), registerForm?.querySelector('input[name="password"]'), registerForm?.querySelector('input[name="password_confirmation"]')]
        .filter(Boolean).forEach(inp => inp.addEventListener('input', validateRegisterForm));

    // Prevent submit if client-side invalid
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const msgs = validateLoginForm();
            if (msgs.length) e.preventDefault();
        });
    }
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            const msgs = validateRegisterForm();
            if (msgs.length) e.preventDefault();
        });
    }
});
</script>
@endsection
