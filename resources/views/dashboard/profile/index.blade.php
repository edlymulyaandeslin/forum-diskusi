@extends('dashboard.layouts.main')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-column flex-wrap flex-md-nowrap  pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Profile</h1>
    </div>
    <div class="col-md-8 mb-3 ">
        <form action="/dashboard/profile/{{ $profiles->id }}" method="POST" class="row g-3">
            @method('put')
            @csrf
            <div class="col-12">
                <label for="name" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $profiles->name) }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-12">
                <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" value="{{ old('username', $profiles->username) }}">
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $profiles->email) }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-12">
                <label for="umur" class="form-label">Umur</label>
                <input type="text" class="form-control" id="umur" name="umur" value="{{ $profiles->umur }}">
            </div>

            <div class="col-md-12">
                <label for="bio" class="form-label">Bio</label>
                <textarea type="text" class="form-control" name="bio" id="bio" rows="4">{{ $profiles->bio }}</textarea>
            </div>

            <div class="col-12">
                <label for="alamat" class="form-label">Address</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $profiles->alamat }}">
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/dashboard/profile" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
@endsection
