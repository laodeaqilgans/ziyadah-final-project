    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">

        <title>@yield('title', 'Ziyadah')</title> <!-- Title default: Aplikasi Ziyadah Harian -->

        <link rel="icon" href="{{ asset('images/bq-circle-2.png') }}" sizes="192x192" type="image/png">

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
        <!-- Add this in your <head> tag -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet"> <!-- CSS kustom Anda -->
    </head>

    <body>
        <div class="loader">
            <div class="spinner-grow text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Menampilkan pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="page-container">
            <!-- Page Header -->
            <div class="page-header">
                <nav class="navbar navbar-expand-lg d-flex justify-content-between">
                    <div id="navbarNav">
                        <ul class="navbar-nav" id="leftNav">
                            <li class="nav-item">
                                <a class="nav-link" id="sidebar-toggle" href="#"><i
                                        data-feather="arrow-left"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand-1" href="{{ url('/') }}">
                                    <!-- Menambahkan ikon Al-Quran sebelum teks -->
                                    <i class="fas fa-book-open ms-2" style="margin-right: 5px;"></i>
                                    <!-- Adjusting spacing between icon and text -->
                                    <span class="app-name" style="vertical-align: middle;">Ziyadah</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="headerNav">
                        <ul class="navbar-nav">
                            <!-- Search Bar -->
                            <li class="nav-item dropdown">
                                <a class="nav-link search-dropdown" href="#" id="searchDropDown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="search"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-lg search-drop-menu"
                                    aria-labelledby="searchDropDown">
                                    <form>
                                        <input class="form-control" type="text" placeholder="Type something.."
                                            aria-label="Search">
                                    </form>
                                    <h6 class="dropdown-header">Recent Searches</h6>
                                    <a class="dropdown-item" href="#">charts</a>
                                    <a class="dropdown-item" href="#">new orders</a>
                                    <a class="dropdown-item" href="#">file manager</a>
                                    <a class="dropdown-item" href="#">new users</a>
                                </div>
                            </li>

                            <!-- Profile Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('images/bq-circle-2.png') }}" alt="Logo" class="profile-img">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end profile-drop-menu"
                                    aria-labelledby="profileDropDown">
                                    <!-- Tampilkan menu Logout jika pengguna sudah login -->
                                    @if (Auth::check())
                                        <!-- Link Logout -->
                                        <a href="{{ route('logout') }}" class="dropdown-item logout-link"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i data-feather="log-out"></i> Logout
                                        </a>
                                        <!-- Form Logout (tersembunyi) -->
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </li>

                        </ul>
                    </div>

                    {{-- logo --}}

                </nav>
            </div>

            <!-- Sidebar -->
            <div class="page-sidebar">
                <ul class="list-unstyled accordion-menu">
                    <li class="sidebar-title">
                        Main
                    </li>
                    <li>
                        <a href="{{ url('/') }}"><i data-feather="home"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('santri') }}"><i  data-feather="users"></i>Santri</a>
                    </li>
                    <li>
                        <a href="{{ url('baca') }}"><i data-feather="book"></i>Al-Qur'an</a>
                    </li>
                </ul>
            </div>

            <!-- Page Content -->
            <div class="page-content">
                <div class="main-wrapper">
                    @yield('content') <!-- Konten halaman lainnya (seperti create, edit) akan ditampilkan di sini -->
                </div>
            </div>
        </div>

        <!-- Javascripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.min.js') }}"></script>

        <!-- Initialize Feather Icons -->
        <script>
            feather.replace();
        </script>
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </body>

    </html>
