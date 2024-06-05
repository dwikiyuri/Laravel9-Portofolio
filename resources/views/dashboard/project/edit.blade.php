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
              <h5 class="card-title">Edit Project</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('project.update', $data->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label for="nama_project" class="col-sm-2 col-form-label">Nama Project</label>
                    <div class="col-sm-6">
                      <input type="text" value="{{ $data->nama_project }}" class="form-control" id="inputJudul" name="nama_project">
                    </div>
                  </div>
                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="provinsi" name="category_id">
                            <option value="">Pilih Category</option>
                            @foreach($category as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $data->category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
                @endforeach

                        </select>
                    </div>

                  </div>
                  <div class="row mb-3">
                    <label for="link_github" class="col-sm-2 col-form-label">Link Github</label>
                    <div class="col-sm-6">
                      <input type="text" value="{{ $data->link_github }}" class="form-control" id="link_github" name="link_github">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="link_demo" class="col-sm-2 col-form-label">Link Demo</label>
                    <div class="col-sm-6">
                      <input type="text" value="{{ $data->link_demo }}" class="form-control" id="link_demo" name="link_demo">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Isi</label>
                    <div class="col-sm-10">
                      <textarea type="text"  rows="2" class="form-control summernote" id="inputEmail" name="keterangan">{{ $data->keterangan }}</textarea>
                    </div>
                  </div>

                  @if(!empty($data->fileproject))
                  <div class="row mb-3 justify-content-center">
                      <img src="{{ asset('foto_project/' . $data->fileproject) }}" style="max-width:400px;max-height:200px" alt="Foto Project">
                  </div>
              @endif
                <div class="row mb-3">
                  <label for="foto" class="col-sm-2 col-form-label">Foto Project</label>
                  <div class="col-sm-4">
                    <input type="file" value="" class="form-control" id="foto" name="foto_project">

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
