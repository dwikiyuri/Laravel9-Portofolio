@extends('dashboard.layout')
@section('konten')
@include('sweetalert::alert')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">

            <li class="breadcrumb-item active">   {{ Breadcrumbs::render('dashboard.halaman.index') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg">
            <div class="card">
              <div class="card-body">
                @include('dashboard.message')
                <h5 class="card-title">Tabel Halaman</h5>
                <a href="{{ route('halaman.create') }}" class="btn btn-dark mb-3">+Tambah Halaman</a>
                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Judul</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1?>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$d->judul}}</td>
                        <td>
                            <a href="{{ route('halaman.edit', $d->id)}}"  class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                            <form method="POST" onsubmit="return confirm('Yakin ingin menghapus data')" action="{{ route('halaman.destroy', $d->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger" name='submit' type="submit"><i class="bi bi-trash"></i></button>
                        </form>

                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach


                  </tbody>
                </table>
                <!-- End Default Table Example -->
              </div>
            </div>
          </div>
        </div>
      </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
