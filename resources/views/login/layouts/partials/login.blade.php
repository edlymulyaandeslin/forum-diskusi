{{-- Login --}}
<div class="form-container sign-in">

    <form method="POST" action="/login">
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
        @csrf
        <h1>Sign In</h1>
        <div class="input-container">
            <span><i class="fa-solid fa-user"></i></span>
            <input type="email" name="email" id="email" placeholder="Email" required value="{{ old('email') }}"
                autofocus>
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-container">
            <span><i class="fa-solid fa-lock"></i></span>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror


        <button type="submit">Masuk</button>
    </form>
</div>
