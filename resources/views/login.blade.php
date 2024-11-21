<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }

        .login-section, .image-section {
            flex: 1;
            height: 100vh;
            width: 50vw;
        }

        .login-section {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
        }

        .login-form {
            max-width: 400px;
            width: 800px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .login-form h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .login-form p {
            margin-bottom: 30px;
            color: #777;
        }

        .image-section {
            background-image: url('assets/images/login.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 50vw;
        }


        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .text-muted a {
            color: #007bff;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }
        h2{
            font-size: 25px;
        }
    </style>
</head>
<body>
    <!-- Login Form Section -->
    <div class="login-section">
        <div class="login-form">
            <h2>WELCOME TO SYNERGY COLLEGE PORTAL.</h2>
            <p>This portal is accessible only to admins. Please log in below.</p>



            {{-- Display error messages in an alert --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <form method="POST" action="{{ url('/user') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="name" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Log In</button>

                <div class="text-center mt-3">
                    <a href="#" class="text-muted">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Image Section -->
    <div class="image-section"></div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
