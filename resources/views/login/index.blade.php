@include('login.layouts.loginMain')
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style-with-prefix.css">

</head>

<body>

    <div class="main-container">
        <div class="form-container">

            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger" role="alert">
                    {{ session('loginError') }}
                </div>
            @endif

            <div class="form-body">
                <h2 class="title mb-4">Log in to Forum</h2>
                <hr>
                <form action="/login" method="post" class="the-form">
                    @csrf

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required
                        value="{{ old('email') }}" autofocus>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <button type="submit">Login</button>
                </form>

            </div><!-- FORM BODY-->

            <div class="form-footer">
                <div>
                    <span>Don't have an account?</span> <a href="/register">Sign Up</a>
                </div>
            </div><!-- FORM FOOTER -->

        </div>
        <!-- FORM CONTAINER -->
    </div>

</body>

</html> --}}
