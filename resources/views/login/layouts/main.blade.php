<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css" />
        <title>From Login</title>
    </head>

    <body>

        <div class="container" id="container">

            @include('login.layouts.partials.login')

            @include('login.layouts.partials.register')

            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Welcome Back!</h1>
                        <p>Already have an account? Login now!</p>
                        <button class="hidden" id="login">Masuk</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Hello, Friend!</h1>
                        <p>
                            Silakan Daftar Untuk Bergabung ke Forum Diskusi
                        </p>
                        <button class="hidden" id="register">Daftar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="/js/script.js"></script>
    </body>

</html>
