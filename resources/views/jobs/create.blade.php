@extends('layouts.master')

@section('content')
<h1 class="mb-3">Create Job</h1>
<form action="{{ route('jobs.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-2">
        <label>Category</label>
        <input type="text" name="category" class="form-control">
    </div>
    <div class="mb-2">
        <label>Type</label>
        <input type="text" name="type" class="form-control" value="Full-time" required>
    </div>
    <div class="mb-2">
        <label>Salary</label>
        <input type="text" name="salary" class="form-control">
    </div>
    <div class="mb-2">
        <label>Experience</label>
        <input type="text" name="experience" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Create Job</button>
</form>
@endsection
