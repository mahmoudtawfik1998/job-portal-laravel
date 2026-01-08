@extends('layouts.master')

@section('title', 'Job Listing')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        <!-- Slide 1 -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('img/carousel-1.jpg') }}" alt="Slide 1">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, 0.5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">
                                Find The Perfect Job That You Deserved
                            </h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.
                            </p>
                            <a href="{{ route('jobs.index') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                Search A Job
                            </a>
                            <a href="#" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">
                                Find A Talent
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
<!-- Carousel End -->
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- الصور -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                    <div class="col-6 text-start">
                        <img class="img-fluid w-100" src="img/about-1.jpg" alt="Teamwork">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;" alt="Office Environment">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;" alt="Collaboration">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid w-100" src="img/about-4.jpg" alt="Success">
                    </div>
                </div>
            </div>

            <!-- النص -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">We Help You Find The Best Jobs & Talents</h1>
                <p class="mb-4">
                    At JobEntry, we connect top talent with the right opportunities. Our platform makes job hunting and talent discovery simple and efficient for both companies and job seekers.
                </p>
                <p><i class="fa fa-check text-primary me-3"></i>Expert guidance for career growth</p>
                <p><i class="fa fa-check text-primary me-3"></i>Wide range of job categories</p>
                <p><i class="fa fa-check text-primary me-3"></i>Trusted by top companies worldwide</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 1 }}s">
                    <a class="cat-item rounded p-4" href="{{ route('jobs.byCategory', $category->id) }}">
                        <i class="{{ $category->icon }} fa-3x text-primary mb-4"></i>
                        <h6 class="mb-3">{{ $category->name }}</h6>
                        <p class="mb-0">{{ $category->jobs_count }} Vacancy</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Category End -->


<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            Job Listing
        </h1>

        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active"
                    data-bs-toggle="pill" href="#tab-featured">
                        <h6 class="mt-n1 mb-0">Featured</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3"
                    data-bs-toggle="pill" href="#tab-fulltime">
                        <h6 class="mt-n1 mb-0">Full Time</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3"
                    data-bs-toggle="pill" href="#tab-parttime">
                        <h6 class="mt-n1 mb-0">Part Time</h6>
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                <!-- Featured -->
                <div id="tab-featured" class="tab-pane fade show p-0 active">
                    @foreach($featuredJobs as $job)
                        @include('jobs.partials.job-item', ['job' => $job])
                    @endforeach
                </div>

                <!-- Full Time -->
                <div id="tab-fulltime" class="tab-pane fade show p-0">
                    @foreach($fullTimeJobs as $job)
                        @include('jobs.partials.job-item', ['job' => $job])
                    @endforeach
                </div>

                <!-- Part Time -->
                <div id="tab-parttime" class="tab-pane fade show p-0">
                    @foreach($partTimeJobs as $job)
                        @include('jobs.partials.job-item', ['job' => $job])
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->


@endsection
