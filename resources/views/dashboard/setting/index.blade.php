@extends('dashboard.layout')

@section('konten')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Halaman</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">   {{ Breadcrumbs::render('dashboard.setting.index') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
@include('dashboard.message')
      <div class="row">

        <div class="col-lg">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Foto Profil</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('setting.update')}}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">About</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="about" name="halamanabout">
                            <option value="">Pilih </option>
                            @foreach($datahalaman as $d )
                            <option value="{{$d->id}}" {{get_meta_value('halaman_about') == $d->id ? 'selected' : ''}}>
                                {{$d->judul}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="about" name="halamancontact">
                            <option value="">Pilih </option>
                            @foreach($datahalaman as $d )
                            <option value="{{$d->id}}" {{get_meta_value('halaman_contact') == $d->id ? 'selected' : ''}}>
                                {{$d->judul}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">Interest</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="about" name="halamaninterest">
                            <option value="">Pilih </option>
                            @foreach($datahalaman as $d )
                            <option value="{{$d->id}}" {{get_meta_value('halaman_about') == $d->id ? 'selected' : ''}}>
                                {{$d->judul}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">Award</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="about" name="halamanaward">
                            <option value="">Pilih </option>
                            @foreach($datahalaman as $d )
                            <option value="{{$d->id}}" {{get_meta_value('halaman_award') == $d->id ? 'selected' : ''}}>
                                {{$d->judul}}
                            </option>
                            @endforeach
                        </select>
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
    </section>


  </main>


@endsection
