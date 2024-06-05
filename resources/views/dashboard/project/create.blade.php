@extends('dashboard.layout')

@section('konten')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Project</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">   {{ Breadcrumbs::render('dashboard.project.create') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
@include('dashboard.message')
      <div class="row">

        <div class="col-lg">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Project</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('project.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row mb-3">
                    <label for="nama_project" class="col-sm-2 col-form-label">Nama Project</label>
                    <div class="col-sm-6">
                      <input type="text" value="{{ Session::get('nama_project')}}" class="form-control" id="inputJudul" name="nama_project">
                    </div>
                  </div>
                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="provinsi" name="category_id">
                            <option value="">Pilih Category</option>
                            @foreach($category as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                        </select>
                    </div>

                  </div>
                  <div class="row mb-3">
                    <label for="link_github" class="col-sm-2 col-form-label">Link Github</label>
                    <div class="col-sm-6">
                      <input type="text" value="{{ Session::get('link_github')}}" class="form-control" id="link_github" name="link_github">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="link_demo" class="col-sm-2 col-form-label">Link Demo</label>
                    <div class="col-sm-6">
                      <input type="text" value="{{ Session::get('link_demo')}}" class="form-control" id="link_demo" name="link_demo">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Isi</label>
                    <div class="col-sm-10">
                      <textarea type="text"  rows="2" class="form-control summernote" id="inputEmail" name="keterangan">{{ Session::get('keterangan') }}</textarea>
                    </div>
                  </div>
                  <div class="row mb-3">

                    <img src="" style="max-width:400px;max-height:200px" alt="">

                  </div>
                  <p>{{ Session::get('foto_project')}}</p>
                <div class="row mb-3">
                  <label for="foto" class="col-sm-2 col-form-label">Foto Project</label>
                  <div class="col-sm-4">
                    <input type="file" value="{{ Session::get('fotoproject')}}" class="form-control" id="foto" name="foto_project" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>


        </div>


      </div>
    </section>


  </main>




@endsection
