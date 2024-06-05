@extends('dashboard.layout')
@section('konten')
@include('sweetalert::alert')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Project</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">{{ Breadcrumbs::render('dashboard.project.index') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg">
            <div class="card">
              <div class="card-body">
                @include('dashboard.message')
                <h5 class="card-title">Tabel Project</h5>
                <a href="{{ route('project.create') }}" class="btn btn-dark mb-3">+Tambah Project</a>
                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Category</th>
                      <th scope="col">Nama Project</th>

                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $i => $d)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $d->category ? $d->category->name : 'No Category' }}</td>
                        <td>{{ $d->nama_project }}</td>

                        <td>
                            <a href="{{ route('project.edit', $d->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('project.destroy', $d->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $d->id }}', 'Hapus Data', 'Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
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
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection

<script>
    function confirmDelete(id, title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
