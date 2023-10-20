{{-- Register --}}
<div class="form-container sign-up">
    <form method="post" action="/register">
        @csrf
        <h1>Create Account</h1>

        <div class="input-container">
            <span><i class="fa-regular fa-user"></i></span>
            <input type="text" name="name" id="namalengkap" class="@error('name') is-invalid @enderror"
                placeholder="Nama Lengkap" value="{{ old('name') }}" required>
        </div>
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="input-container">
            <span><i class="fa-solid fa-user"></i></span>
            <input type="text" name="username" id="username" class="@error('name') is-invalid @enderror"
                placeholder="Username" value="{{ old('username') }}" required>
        </div>
        @error('username')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="input-container">
            <span><i class="fa-solid fa-envelope"></i></span>
            <input type="email" name="email" id="email" class="@error('name') is-invalid @enderror"
                placeholder="Email" value="{{ old('email') }}" required>
        </div>
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="input-container">
            <span><i class="fa-solid fa-lock"></i></span>
            <input type="password" name="password" id="password" class="@error('name') is-invalid @enderror"
                placeholder="New password" required>
        </div>
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <button type="submit">Buat Akun</button>
    </form>
</div>
