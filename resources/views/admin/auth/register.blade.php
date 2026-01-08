<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">
    <title>Product Management System</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/tabler-icons/tabler-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <form id="register-form" method="POST" action="{{ route('admin.registration')}}">
                    @csrf
                        <div class="login-user-info">
                            @if(session()->has('error'))
                                <div class="alert alert-danger fade-msg">{{ session()->get('error') }}</div>
                            @endif
                            @if(session()->has('success'))
                                <div class="alert alert-success fade-msg">{{ session()->get('success') }}</div>
                            @endif
                          
                            <div class="login-heading">
                                <h4>Register</h4>
                                <p>Register for Admin panel using your basic details.</p>
                            </div>
                            <div class="form-wrap">
                                <label class="col-form-label">Name</label>
                                <div class="form-wrap-icon">
                                    <input type="text" class="form-control name" name="name" value="{{ old('name')}}"/>
                                    <span class="text-danger nameError" style="display: none"></span>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-wrap">
                                <label class="col-form-label">Email Address</label>
                                <div class="form-wrap-icon">
                                    <input type="email" class="form-control email" name="email" value="{{ old('email')}}"/>
                                    <i class="ti ti-mail"></i>
                                    <span class="text-danger emailError" style="display: none"></span>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-wrap">
                                <label class="col-form-label">Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input form-control password" name="password" maxlength="12"/>
                                    <span class="ti toggle-password passwordEye ti-eye-off"></span>
                                    <span class="text-danger passwordError" style="display: none"></span>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-wrap">
                                <label class="col-form-label">Confirm Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input form-control comfirmPassword" name="confirm_password" maxlength="12"/>
                                    <span class="ti toggle-password confirmPasswordEye ti-eye-off"></span>
                                    <span class="text-danger comfirmPasswordError" style="display: none"></span>
                                    @error('confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-wrap form-wrap-checkbox">
                                <div class="custom-control custom-checkbox"></div>
                                <div class="text-end">
                                    <a href="{{route('admin.login')}}" class="forgot-link">Login</a>
                                </div> 
                            </div>
                            <div class="form-wrap">
                                <button type="submit" class="btn btn-primary register-btn">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>  
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/feather.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            setTimeout(() => {
                $('.fade-msg').fadeOut();
            }, 3000);

            // Password visibility toggle
            $('.passwordEye').on('click', function() {
                var passwordField = $('.password');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).toggleClass('ti-eye ti-eye-off');
            });

            //Confirm Password visibility toggle
            $('.confirmPasswordEye').on('click', function() {
                var confirmPasswordField = $('.comfirmPassword');
                var type = confirmPasswordField.attr('type') === 'password' ? 'text' : 'password';
                confirmPasswordField.attr('type', type);
                $(this).toggleClass('ti-eye ti-eye-off');
            });

            $('.register-btn').on('click', function(e) {
                e.preventDefault();
                var valid = true;
                var name = $('.name').val();
                var email = $('.email').val();
                var password = $('.password').val();
                var comfirmPassword = $('.comfirmPassword').val();

                //Name validation
                if(!name) {
                    valid = false;
                    $('.nameError').html('');
                    $('.nameError').show();
                    $('.nameError').html('Name field is required.');
                } else if(name.length > 50) {
                    valid = false;
                    $('.nameError').html('');
                    $('.nameError').show();
                    $('.nameError').html('Name must not be greater than 50 characters.');
                } else {
                    $('.nameError').html('');
                    $('.nameError').hide();
                }

                //Email validation
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if(!email) {
                    valid = false;
                    $('.emailError').html('');
                    $('.emailError').show();
                    $('.emailError').html('Email field is required.');
                } else if(!emailPattern.test(email)) {
                    valid = false;
                    $('.emailError').html('');
                    $('.emailError').show();
                    $('.emailError').html('The email field must be a valid email address.');
                } else {
                    $('.emailError').html('');
                    $('.emailError').hide();
                }

                // Password validation
                if(!password) {
                    valid = false;
                    $('.passwordError').html('');
                    $('.passwordError').show();
                    $('.passwordError').html('Password field is required.');
                } else if(password.length > 12) {
                    valid = false;
                    $('.passwordError').html('');
                    $('.passwordError').show();
                    $('.passwordError').html('Password must not be greater than 12 characters.');
                } else {
                    $('.passwordError').html('');
                    $('.passwordError').hide();
                }

                //Confirm Password Validatiob
                if(!comfirmPassword) {
                    valid = false;
                    $('.comfirmPasswordError').html('');
                    $('.comfirmPasswordError').show();
                    $('.comfirmPasswordError').html('Confirm Password field is required.');
                } else if(password.length > 12) {
                    valid = false;
                    $('.comfirmPasswordError').html('');
                    $('.comfirmPasswordError').show();
                    $('.comfirmPasswordError').html('Confirm Password must not be greater than 12 characters.');
                } else {
                    $('.comfirmPasswordError').html('');
                    $('.comfirmPasswordError').hide();
                }

                if(valid) {
                    $('#register-form').submit();
                }
            });
        });
    </script>
 </body>
</html>
