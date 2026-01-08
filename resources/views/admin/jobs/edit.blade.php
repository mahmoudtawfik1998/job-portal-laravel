@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Job</h2>

    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Job Title</label>
            <input type="text" name="title" value="{{ $job->title }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Company</label>
            <input type="text" name="company" value="{{ $job->company }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" value="{{ $job->location }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5">{{ $job->description }}</textarea>
        </div>

        <button class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
