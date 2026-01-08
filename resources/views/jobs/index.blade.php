@extends('layouts.master')

@section('content')

<h3 class="mb-4">Categories</h3>
<div class="row g-4">
    @foreach($categories as $category)
        <div class="col-lg-3 col-sm-6">
            <a href="{{ route('jobs.byCategory', $category->id) }}" class="cat-item rounded p-4">
                <i class="{{ $category->icon }} fa-3x text-primary mb-4"></i>
                <h6 class="mb-3">{{ $category->name }}</h6>
                <p class="mb-0">{{ $category->jobs_count }} Vacancy</p>
            </a>
        </div>
    @endforeach
</div>


<!-- Job List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5">All Jobs</h1>

        <div class="row g-4">
            @foreach($jobs as $job)
                @include('jobs.partials.job-item', ['job' => $job])
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $jobs->links() }}
        </div>
    </div>
</div>
<!-- Job List End -->


@endsection
