@extends('dashboard.layouts.main')

@section('content')
    <div class="mb-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update Detail Category</h1>
        </div>

        <form method="POST" action="/dashboard/categories/{{ $category->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name', $category->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
