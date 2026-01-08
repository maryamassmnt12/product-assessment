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
                    <form id="login-form" action="{{ route('admin.loggedin')}}" method="POST">
                    @csrf
                        <div class="login-user-info">
                            @if(session()->has('error'))
                                <div class="alert alert-danger fade-msg">{{ session()->get('error') }}</div>
                            @endif
                            @if(session()->has('success'))
                                <div class="alert alert-success fade-msg">{{ session()->get('success') }}</div>
                            @endif
                           
                            <div class="login-heading">
                                <h4>Sign In</h4>
                                <p>Access the Admin panel using your email and passcode.</p>
                            </div>
                            <div class="form-wrap">
                                <label class="col-form-label">Email Address</label>
                                <div class="form-wrap-icon">
                                    <input type="email" class="form-control email" name="email" value="{{ old('email')}}"/>
                                    <i class="ti ti-mail"></i>
                                    <span class="text-danger emailError" style="display: none"></span>
                                </div>
                            </div>
                            <div class="form-wrap">
                                <label class="col-form-label">Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input form-control password" name="password" maxlength="12"/>
                                    <span class="ti toggle-password ti-eye-off"></span>
                                    <span class="text-danger passwordError" style="display: none"></span>
                                </div>
                            </div>
                            <div class="form-wrap form-wrap-checkbox">
                                <div class="custom-control custom-checkbox">
                                    
                                </div>
                                <div class="text-end">
                                    <a href="{{route('admin.register')}}" class="forgot-link">Register</a>
                                </div> 
                            </div>
                            <div class="form-wrap">
                                <button type="submit" class="btn btn-primary login-btn">Sign In</button>
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
            $('.toggle-password').on('click', function() {
                var passwordField = $('.password');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).toggleClass('ti-eye ti-eye-off');
            });

            $('.login-btn').on('click', function(e) {
                e.preventDefault();
                var valid = true;
                var email = $('.email').val();
                var password = $('.password').val();

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

                if(valid) {
                    $('#login-form').submit();
                }
            });
        });
    </script>
 </body>
</html>
