<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'JobEntry')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Main Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-xxl bg-white p-0">

    <!-- Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <h1 class="m-0 text-primary">JobEntry</h1>
        </a>


    <!-- دايمًا ظاهر -->
    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
    <a href="{{ route('jobs.index') }}" class="nav-item nav-link">Jobs</a>

    {{-- Guest --}}
    @guest
        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
        <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
    @endguest

    {{-- Authenticated --}}
    @auth

        {{-- Admin --}}
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link">Dashboard</a>
            <a href="{{ route('admin.jobs.create') }}" class="nav-item nav-link">Post Job</a>
        @endif

        {{-- User --}}
        <a href="{{ route('profile.edit') }}" class="nav-item nav-link">Profile</a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="nav-item nav-link btn btn-link p-0" style="text-decoration:none">
                Logout
            </button>
        </form>

    @endauth
</div>
        </div>
    </nav>

    <!-- ✅ هنا أي صفحة هتحط محتواها -->
    @yield('content')
</div>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">

            <!-- Company -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Company</h5>
                <a class="btn btn-link text-white-50" href="#">About Us</a>
                <a class="btn btn-link text-white-50" href="#">Contact Us</a>
                <a class="btn btn-link text-white-50" href="#">Our Services</a>
                <a class="btn btn-link text-white-50" href="#">Privacy Policy</a>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link text-white-50" href="{{ route('jobs.index') }}">Find A Job</a>

@auth
    @if(auth()->user()->role === 'admin')
        <a class="btn btn-link text-white-50" href="{{ route('admin.jobs.create') }}">
            Post A Job
        </a>
    @endif
@endauth

            </div>

            <!-- Contact -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Contact</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Egypt</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0100985642</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>Jobs@gmail.com</p>
            </div>

            <!-- Newsletter (Static) -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p>Coming soon.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button"
                        class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        SignUp
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }} <a class="border-bottom" href="#">JobEntry</a>, All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->



<!-- JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('wow/wow.min.js') }}"></script>
<script src="{{ asset('easing/easing.min.js') }}"></script>
<script src="{{ asset('waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

</body>
</html>
