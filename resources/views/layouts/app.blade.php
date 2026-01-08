<!DOCTYPE html>
<html lang="en">
<head>
    @auth
@if(auth()->user()->role === 'admin')
    <a href="{{ route('admin.dashboard') }}" class="nav-link">Admin Dashboard</a>
@endif
@endauth
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --accent-color: #ec4899;
            --dark-bg: #0f172a;
            --light-bg: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: var(--text-dark);
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: var(--light-bg);
            color: var(--primary-color) !important;
            transform: translateY(-2px);
        }

        .btn-link.nav-link {
            text-decoration: none;
        }

        /* Container Styles */
        .container {
            max-width: 1200px;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-briefcase"></i> Job Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>