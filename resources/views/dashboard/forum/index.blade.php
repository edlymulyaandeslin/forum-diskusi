@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex flex-column flex-wrap flex-md-nowrap  pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Forum</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-2">
        <a href="/dashboard/forum/create" class="btn btn-sm btn-outline-info ">Ajukan pertanyaan</a>
    </div>
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($questions) > 0)
                    @foreach ($questions as $question)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $question->title }}</td>
                            <td>
                                <a href="/dashboard/forum/{{ $question->id }}" class="badge bg-primary"><span
                                        data-feather="eye"></span></a>

                                <a href="/dashboard/forum/{{ $question->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>

                                <form action="/dashboard/forum/{{ $question->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge bg-danger border-0"
                                        onclick="return confirm('Are you sure?')"><span
                                            data-feather="slash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center border-bottom-0">No data</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
