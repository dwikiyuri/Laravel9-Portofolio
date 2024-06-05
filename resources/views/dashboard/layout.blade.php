<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Portofolio Laravel 9</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('admin') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('admin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- for tokenfield -->
  <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css"
    integrity="sha512-wcf2ifw+8xI4FktrSorGwO7lgRzGx1ld97ySj1pFADZzFdcXTIgQhHMTo7tQIADeYdRRnAjUnF00Q5WTNmL3+A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Template Main CSS File -->
  <link href="{{ asset('admin') }}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('admin')}}/faces/{{Auth::user()->avatar}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name}}</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.index') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('contact.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Email</span>
                </a>
              </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('auth/logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Route::is('dashboard') ? 'active' : 'collapsed' }}" href="{{ route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Route::is('halaman.index') ? 'active' : 'collapsed' }}" href="{{ route('halaman.index') }}">
            <i class="bi bi-folder"></i>
            <span>Halaman</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('experience.index') ? 'active' : 'collapsed' }}" href="{{ route('experience.index') }}">
            <i class="bi bi-briefcase "></i>
            <span>Experience</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('education.index') ? 'active' : 'collapsed' }}" href="{{ route('education.index') }}">
            <i class="bi bi-mortarboard "></i>
            <span>Education</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('skill.index') ? 'active' : 'collapsed' }}" href="{{ route('skill.index') }}">
            <i class="bi bi-wrench "></i>
            <span>Skill</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('project.index') ? 'active' : 'collapsed' }}" href="{{ route('project.index') }}">
            <i class="bi bi-braces "></i>
            <span>Project</span>
        </a>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link {{ Route::is('profile.index') ? 'active' : 'collapsed' }}" href="{{ route('profile.index') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('setting.index') ? 'active' : 'collapsed' }}" href="{{ route('setting.index') }}">
          <i class="bi bi-gear"></i>
          <span>Setting</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('category.index') ? 'active' : 'collapsed' }}" href="{{ route('category.index') }}">
            <i class="bi bi-clipboard2-check"></i>
            <span>Category</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->

     <!-- End F.A.Q Page Nav -->

     <!-- End Contact Page Nav -->

     <!-- End Register Page Nav -->

     <!-- End Login Page Nav -->

     <!-- End Error 404 Page Nav -->

    <!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

        @yield('konten')
  <!-- Vendor JS Files -->
  <script src="{{ asset('admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/quill/quill.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('admin') }}/assets/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
  <!-- token field -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
    @stack('scriptskill')
    @stack('scriptregion')
  <script>
   $(document).ready(function() {
  $('.summernote').summernote({
   height: 200
  });
});
  </script>

</body>

</html>
