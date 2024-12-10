<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
           
        }

        .login-container img {
            max-width: 80px;
            margin-bottom: 10px;
        }

        .login-container h6 {
            margin-bottom: 20px;
            color: #333;
            font-size: 16px;
        }

        .form-control {
            border-radius: 20px;
            border-color: #d1d1d1;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #000;
            box-shadow: none;
        }

        .btn-login {
            background-color: #000;
            color: #fff;
            border-radius: 20px;
            width: 100%;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
        }

        .input-group-text {
            background-color: transparent;
            border-radius: 0 20px 20px 0;
            border: 1px solid #d1d1d1;
            padding-left: 15px;
            padding-right: 15px;
            cursor: pointer;
        }

        .input-group .form-control {
            border-radius: 20px 0 0 20px;
            padding-right: 40px;
            border: 1px solid #d1d1d1;
        }

        .input-group .show-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 5;
        }

        .form-check-label {
            color: #333;
        }

        .form-check {
            margin-bottom: 20px;
        }

        .forgot-password {
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: #000;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .sign-up {
            margin-top: 20px;
            text-align: center;
        }

        .sign-up a {
            color: #000;
            text-decoration: none;
        }

        .sign-up a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .login-container {
                padding: 20px;
            }

            .login-container img {
                max-width: 60px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .btn-login {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Logo Aplikasi -->
        <div>
        <img src="{{ asset('assets/image/voting-box.png') }}" alt="Logo Aplikasi">
            <h6>Aplikasi Rekap Hasil Pemilu</h6>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <x-text-input id="password" class="form-control"
                        type="password"
                        name="password"
                        required autocomplete="current-password" placeholder="Password" />
                    <span class="show-password">
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="form-group d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">
                        {{ __('Remember me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">
                        {{ __('Lupa password') }}
                    </a>
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-login">
                {{ __('Log in') }}
            </button>
        </form>
        
    </div>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Password Toggle Script -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>
