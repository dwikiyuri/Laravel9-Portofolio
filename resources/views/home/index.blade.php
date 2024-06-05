<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portofolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('iPortfolio') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('iPortfolio') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('iPortfolio') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('iPortfolio') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('iPortfolio') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('iPortfolio') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('iPortfolio') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('iPortfolio') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
  <!-- Template Main CSS File -->
  <link href="{{ asset('iPortfolio') }}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iPortfolio-bootstrap-portfolio-websites-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{asset('foto')."/".get_meta_value('foto')}}" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">{{$about->judul}}</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="{{get_meta_value('twitter')}}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="{{get_meta_value('instagram')}}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="{{get_meta_value('github')}}" target="_blank" class="github"><i class="bx bxl-github"></i></a>
          <a href="{{get_meta_value('linkedin')}}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>{{$about->judul}}</h1>
      <p>I'm <span class="typed" data-typed-items="Developer, Freelancer"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
          <div class="section-title">
            <h2>About</h2>
            <p>{!!$about->isi!!}</p>
          </div>

          <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
              <img src="{{ asset('foto') . '/' . get_meta_value('foto') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Bhirt Date:</strong> <span>{{ get_meta_value('ttl') }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ get_meta_value('telp') }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ get_meta_value('email') }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ get_meta_value('provinsi') }}, {{ get_meta_value('kota') }}</span></li>
                  </ul>
                </div>
              </div>
              <button class="btn btn-dark"> Download CV here</button>
            </div>
          </div>
        </div>
      </section>
      <!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts2">
        <div class="container">

          <div class="section-title">
            <h2>My stack</h2>
          </div>

          <div class="row g-4">
            <div class="align-items-stretch">
              <div class="count-box2">
                <div class="slider">
                    @foreach(explode(',', get_meta_value('_programl')) as $item)
                    @php
                    $item = strtolower(trim($item));
                    @endphp
                    <i class="devicon-{{$item}}-plain colored"></i>
                    @endforeach
                </div>
                <div class="slider">
                    @foreach(explode(',', get_meta_value('_programl')) as $item)
                    @php
                    $item = strtolower(trim($item));
                    @endphp
                    <i class="devicon-{{$item}}-plain colored"></i>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Facts Section -->

    <!-- ======= Skills Section ======= -->
   <!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
        <div class="container">
          <div class="section-title">
            <h2>Resume</h2>
          </div>

          <div class="row">
            <div class="col-lg-6" data-aos="fade-up">
              <h3 class="resume-title">Education</h3>
              @foreach($education as $data )
              <div class="resume-item">
                <h4>{{$data->judul}}</h4>
                <h5>{{$data->tahunmulai}} - {{$data->tahunakhir}}</h5>
                <p><em>{{$data->info1}}</em></p>
                <p>{{$data->info2}}&nbsp;IPK({{$data->info3}} ) </p>
                <p>{{$data->isi}}</p>
              </div>
                @endforeach
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="resume-title">Experience</h3>
                @foreach($experience as $data)
                <div class="resume-item">
                  <h4>{{$data->judul}}</h4>
                  <p><em>{{$data->tahunnfo1}}</em></p>
                  <h5>{{$data->tahunmulai}} - {{$data->tahunakhir}}</h5>
                  <p>{!! $data->isi!!} </p>

                </div>
                @endforeach
            </div>
          </div>

        </div>
      </section>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Mini Project</h2>

        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach($category as $item)
              <li data-filter=".filter-{{ strtolower(str_replace(' ', '', $item->name)) }}">{{ $item->name }}</li>

              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
            @foreach($project as $item )

            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ strtolower(str_replace(' ', '', $item->category ? $item->category->name : 'no-category')) }}">
                <div class="portfolio-wrap">
                  <img src="{{ asset('foto_project/' . $item->fileproject) }}" class="img-fluid" alt="">
                  <div class="portfolio-links">
                    <a href="{{$item->link_github}}" target="_blank"><i class="bi bi-github"></i></a>

                  </div>
                </div>
              </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>{{$contact->isi}}</p>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form id="contactForm" method="post" role="form" class="php-email-form">
                @csrf
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>

              <div class="text-center"><button type="submit">Send Message</button></div>
              <div class="loading" >Loading...</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DwikiAdyYuri</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iPortfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('iPortfolio') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('iPortfolio') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('iPortfolio') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('iPortfolio') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('iPortfolio') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('iPortfolio') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('iPortfolio') }}/assets/vendor/typed.js/typed.umd.js"></script>
  <script src="{{ asset('iPortfolio') }}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('iPortfolio') }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('iPortfolio') }}/assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#contactForm').on('submit', function(event) {
        event.preventDefault();

        var form = $(this);
        var url = "{{ route('home.sendMail') }}";
        var formData = form.serialize();

        $.ajax({
          url: url,
          type: "POST",
          data: formData,
          beforeSend: function() {
            $('.loading').show();
            $('.error-message').hide();
            $('.sent-message').hide();
          },
          success: function(response) {
            $('.loading').hide();
            $('.sent-message').show();
            form[0].reset();
          },
          error: function(xhr) {
            $('.loading').hide();
            var errors = xhr.responseJSON.errors;
            var errorMessage = '';
            $.each(errors, function(key, value) {
              errorMessage += value[0] + '<br>';
            });
            $('.error-message').html(errorMessage).show();
          }
        });
      });
    });
  </script>
</body>

</html>
