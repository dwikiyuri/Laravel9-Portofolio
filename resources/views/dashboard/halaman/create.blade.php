@extends('dashboard.layout')

@section('konten')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Halaman</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">   {{ Breadcrumbs::render('dashboard.halaman.create') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
@include('dashboard.message')
      <div class="row">

        <div class="col-lg">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Horizontal Form</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('halaman.store') }}" method="POST" >
                @csrf
                <div class="row mb-3">
                  <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ Session::get('judul')}}" class="form-control" id="inputText" name="judul">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Isi</label>
                  <div class="col-sm-10">
                    <textarea type="text"  rows="5" class="form-control summernote" id="inputEmail" name="isi">{{ Session::get('isi') }}</textarea>
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
