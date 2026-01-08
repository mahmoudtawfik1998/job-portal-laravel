@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Manage Jobs</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Company</th>
                <th>Status</th>
                <th>Applicants</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->company }}</td>
                <td>{{ $job->status ? 'Active' : 'Hidden' }}</td>
                <td>{{ $job->applications()->count() }}</td>

                <td>
                    <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.jobs.destroy', $job->id) }}"
                        method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $jobs->links() }}

</div>
@endsection
