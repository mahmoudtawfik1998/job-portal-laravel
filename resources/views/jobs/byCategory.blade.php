@extends('layouts.master')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ $category->name }} Jobs</h1>

    @foreach($jobs as $job)
        @include('jobs.partials.job-item', ['job' => $job])
    @endforeach

    <div class="d-flex justify-content-center mt-4">
        {{ $jobs->links() }}
    </div>
</div>
@endsection
