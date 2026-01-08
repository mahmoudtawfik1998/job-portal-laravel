@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">All Applications</h2>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Job</th>
                    <th>Applied At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr>
                    <td>{{ $app->name }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->job->title ?? '—' }}</td>
                    <td>{{ $app->created_at->format('Y-m-d') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No applications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $applications->links() }}
    </div>
</div>
@endsection
