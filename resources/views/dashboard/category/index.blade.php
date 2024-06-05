@extends('dashboard.layout')

@section('konten')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Category Setting</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">   {{ Breadcrumbs::render('dashboard.category.index') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
@include('dashboard.message')
      <div class="row">
        <div class="col-lg">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('category.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="row mb-3">
                <label for="nama_project" class="col-sm-2 col-form-label">Nama Category</label>
                <div class="col-sm-6">
                  <input type="text" value="{{ Session::get('nama_category')}}" class="form-control" id="inputJudul" name="name">
                </div>
              </div>
                <div class="row pt-3 mb-3">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form><!-- End Horizontal Form -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Category</h5>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $i => $d)
                  <tr>
                      <td>{{ $i + 1 }}</td>
                      <td>{{ $d->name }}</td>


                      <td>
                          <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('category.destroy', $d->id) }}" class="d-inline">
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
            </div>
          </div>
        </div>
      </div>
    </section>
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



  </main>


@endsection
