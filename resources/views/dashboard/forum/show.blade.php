@extends('dashboard.layouts.main')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center">{{ $question->title }}</h1>
    <h6 class="text-center text-secondary">{{ $question->user->name }} - {{ $question->category->name }}</h6>

    <div>
        <a href="/dashboard" class="btn btn-sm btn-outline-danger"><span data-feather="arrow-left"></span> Back to
            forum</a>
    </div>
    <p class="text-end">{{ $question->created_at->diffForHumans() }}</p>

    <div class="border rounded p-2">
        <p>{!! $question->desc !!}</p>

        @if ($question->image)
            <div class="col-md-8">
                <img src="{{ asset('storage/' . $question->image) }}" alt="noImg" class="img-fluid w-50 mb-3">
            </div>
        @else
            <div class="col-md-8">
                <img class="img-fluid w-25">
            </div>
        @endif

        <a href="/dashboard/forum/{{ $question->id }}" class="btn btn-sm btn-light">👍Like</a>
        <a href="/dashboard/forum/{{ $question->id }}" class="btn btn-sm btn-light"><span
                data-feather="message-square"></span>
            Comment ({{ count($comments) }})</a>
        <a href="/dashboard/forum/{{ $question->id }}" class="btn btn-sm btn-light"><span data-feather="navigation"></span>
            Share</a>
    </div>

    <div class="my-2">
        <form action="/dashboard/comment" method="post">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <textarea name="desc" id="desc" rows="3" class="form-control @error('desc') is-invalid @enderror mb-1"
                placeholder="Tulis komentar" required></textarea>
            @error('desc')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="d-grid">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
    </div>

    @foreach ($comments as $comment)
        <div class="col-md-8 ms-2 my-3 border border-top-0">
            <div class="d-flex align-items-start mt-2">
                <div class="ms-2">
                    <span data-feather="user"></span>
                </div>
                <div class="mb-2">
                    <div class="ms-2 mb-2">
                        <span class="fw-bold">{{ $comment->user->name }}</span>
                        <small class="text-secondary ">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="ms-2 mb-1">
                        {!! $comment->desc !!}
                    </div>

                    @if (auth()->user()->id === $comment->user->id)
                        <div class="ms-2">
                            <form action="/dashboard/comment/{{ $comment->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger border-0">Hapus Comment</button>
                            </form>
                        </div>
                    @else
                        {{ '' }}
                    @endif

                </div>
            </div>
        </div>
    @endforeach
@endsection
