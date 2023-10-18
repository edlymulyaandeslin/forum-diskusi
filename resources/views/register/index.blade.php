<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum | Registration</title>
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style-with-prefix.css">

        <style>
            .srouce {
                text-align: center;
                color: #ffffff;
                padding: 10px;
            }
        </style>
    </head>

    <body>

        <div class="main-container">
            <div class="form-container ">

                <div class="form-body">
                    <h2 class="title mb-4">Registration Account</h2>
                    <hr>
                    <form action="/register" method="POST" class="the-form">
                        @csrf
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror"
                            placeholder="Enter your name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="@error('name') is-invalid @enderror"
                            placeholder="Enter your username" value="{{ old('username') }}" required>
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="@error('name') is-invalid @enderror"
                            placeholder="Enter your email" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="@error('name') is-invalid @enderror" placeholder="Enter your password" required>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <button type="submit">Register</button>
                    </form>

                </div><!-- FORM BODY-->

                <div class="form-footer">
                    <div>
                        <span>Already have an account?</span> <a href="/login">Sign In</a>
                    </div>
                </div><!-- FORM FOOTER -->

            </div>
            <!-- FORM CONTAINER -->
        </div>

    </body>

</html>
