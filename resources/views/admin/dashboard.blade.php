@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Admin Dashboard</h1>
            <small class="text-muted">Overview — quick stats and recent activity</small>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">+ Add Job</a>
            <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary">Manage Jobs</a>
        </div>
    </div>

    <!-- Stats cards -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Jobs</h6>
                    <h2 class="card-text">{{ $totalJobs }}</h2>
                    <small class="text-muted">Published/Hidden: {{ $publishedJobs }} / {{ $hiddenJobs }}</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Applications</h6>
                    <h2 class="card-text">{{ $totalApplications }}</h2>
                    <small class="text-muted">Since start</small>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Latest Job</h6>
                    <p class="mb-1 fw-bold">{{ $latestJob->title ?? 'No jobs yet' }}</p>
                    <small class="text-muted">{{ $latestJob?->created_at?->format('Y-m-d') }}</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Jobs & Applications -->
    <div class="row">
        <!-- Latest Jobs -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Latest Jobs</strong>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-sm btn-link">See all</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Applicants</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestJobs as $job)
                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->type }}</td>
                                    <td>{{ $job->applications()->count() }}</td>
                                    <td>{{ $job->created_at?->format('Y-m-d') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No jobs yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Applications -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Latest Applications</strong>
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-sm btn-link">See all</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Job</th>
                                    <th>Applied</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestApplications as $app)
                                <tr>
                                    <td>{{ $app->name }}</td>
                                    <td>{{ $app->email }}</td>
                                    <td>{{ $app->job->title ?? '—' }}</td>
                                    <td>{{ $app->created_at?->format('Y-m-d') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No applications yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
