@extends('layouts.master')

@section('content')

<!-- Job Detail Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">

            <!-- Job Details -->
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
                    <img class="flex-shrink-0 img-fluid border rounded"
                        src="{{ asset('assets/img/com-logo-1.jpg') }}"
                        style="width: 80px; height: 80px;">

                    <div class="text-start ps-4">
                        <h3 class="mb-3">{{ $job->title }}</h3>

                        <span class="text-truncate me-3">
                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                            {{ $job->location ?? 'N/A' }}
                        </span>

                        <span class="text-truncate me-3">
                            <i class="far fa-clock text-primary me-2"></i>
                            {{ ucfirst($job->type) }}
                        </span>

                        <span class="text-truncate me-0">
                            <i class="far fa-money-bill-alt text-primary me-2"></i>
                            {{ $job->salary ?? 'N/A' }}
                        </span>
                    </div>
                </div>

                <!-- Job Description -->
                <div class="mb-5">
                    <h4 class="mb-3">Job description</h4>
                    <p>{{ $job->description }}</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Job Summary</h4>

                    <p>
                        <i class="fa fa-angle-right text-primary me-2"></i>
                        Published On:
                        {{ optional($job->created_at)->format('d M, Y') }}
                    </p>

                    <p>
                        <i class="fa fa-angle-right text-primary me-2"></i>
                        Job Type:
                        {{ ucfirst($job->type) }}
                    </p>

                    <p>
                        <i class="fa fa-angle-right text-primary me-2"></i>
                        Salary:
                        {{ $job->salary ?? 'N/A' }}
                    </p>

                    <a href="#apply"
                    class="btn btn-primary py-3 px-5 mt-3">
                        Apply Now
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Job Detail End -->

<!-- Apply Form -->
<div id="apply" class="container-xxl py-5">
    <div class="container">
        <h4 class="mb-4">Apply for this job</h4>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('applications.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}">

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>

                <div class="col-12">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                </div>

                <div class="col-12">
                    <textarea name="cover_letter" class="form-control" rows="5" placeholder="Cover Letter"></textarea>
                </div>

                <div class="col-12">
                    <input type="file" name="cv" class="form-control" accept=".pdf">
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3">
                        Submit Application
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
