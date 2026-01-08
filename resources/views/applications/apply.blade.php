@extends('layouts.master')

@section('content')

<div class="container py-5">

    <h2 class="mb-4 text-center">{{ $job->title }}</h2>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="bg-light rounded p-4 shadow-sm">
                <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Cover Letter</label>
                        <textarea name="cover_letter" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Upload CV (PDF only)</label>
                        <input type="file" name="cv" class="form-control" accept=".pdf">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit Application</button>
                </form>
            </div>

        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-secondary">← Back to Job Details</a>
    </div>

</div>

@endsection
