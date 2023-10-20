@extends('dashboard.layouts.main')
@section('content')
<main role="main">
    <div class="d-flex flex-column flex-wrap flex-md-nowrap  pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="jumbotron">
        <div class="container text-center">
            <h3 class="display-3">{{ auth()->user()->username }}</h3>
            <p>Usia : {{ auth()->user()->umur }} tahun</p>
            <p>Alamat : {{ auth()->user()->alamat }}</p>
            <p>{{ auth()->user()->bio }}</p>
            <p><a class="btn btn-dark btn-md" href="/dashboard/profile/{{ $profiles->id }}/edit" role="button">Change Profile &raquo;</a></p>
        </div>
    </div>
</main>

@endsection
