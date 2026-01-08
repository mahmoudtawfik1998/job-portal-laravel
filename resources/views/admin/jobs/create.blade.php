@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Add New Job</h2>

    <form action="{{ route('admin.jobs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Job Type</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="text" name="salary" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Experience</label>
            <input type="text" name="experience" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Job</button>
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

</div>
@endsection
