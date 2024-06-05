@extends('dashboard.layout')

@section('konten')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Experience</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">   {{ Breadcrumbs::render('dashboard.experience.create') }}</li>
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
              <form action="{{ route('experience.store') }}" method="POST" >
                @csrf
                <div class="row mb-3">
                  <label for="inputJudul" class="col-sm-2 col-form-label">Posisi</label>
                  <div class="col-sm-4">
                    <input type="text" value="{{ Session::get('judul')}}" class="form-control" id="inputJudul" name="judul">
                  </div>

                </div>
                <div class="row mb-3">
                    <label for="inputInfo1" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-7">
                      <input placeholder="Nama Perusahaan" type="text" value="{{ Session::get('info1')}}" class="form-control" id="inputInfo1" name="info1">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputTanggalMulai" class="col-sm-2 col-form-label">Tanggal mulai</label>
                    <div class="col-sm-3">
                      <input   type="date" value="{{ Session::get('tanggalmulai')}}" v class="form-control" id="inputTanggalMulai" onchange="setMinTanggalAkhir()" name="tanggalmulai">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputTanggalSelesai" class="col-sm-2 col-form-label">Tanggal selesai</label>
                    <div class="col-sm-3">
                      <input   type="date" value="{{ Session::get('tanggalakhir')}}" class="form-control" id="inputTanggalSelesai" name="tanggalakhir">
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="stillworking" onchange="toggleTanggalSelesai()">
                        <label class="form-check-label" for="stillworking">Still Working</label>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Isi</label>
                  <div class="col-sm-10">
                    <textarea type="text"  rows="5" class="form-control summernote" id="inputEmail" name="isi">{{ Session::get('isi') }}</textarea>
                  </div>
                </div>
                <input type="hidden" id="hiddenStillWorking" name="stillworking" value="">

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>


        </div>


      </div>
    </section>

    <script>
        function setMinTanggalAkhir() {
            var tanggalMulai = document.getElementById('inputTanggalMulai').value;
            var tanggalSelesai = document.getElementById('inputTanggalSelesai');
            if (tanggalMulai) {
                tanggalSelesai.min = tanggalMulai;
            }
        }
        function toggleTanggalSelesai() {
    var stillWorking = document.getElementById('stillworking').checked;
    var tanggalSelesai = document.getElementById('inputTanggalSelesai');
    var hiddenStillWorking = document.getElementById('hiddenStillWorking');
    if (stillWorking) {
        tanggalSelesai.disabled = true;
        tanggalSelesai.value = '';
        hiddenStillWorking.value = '1'; // Memberikan nilai 1 jika dicentang
    } else {
        tanggalSelesai.disabled = false;
        hiddenStillWorking.value = ''; // Memberikan nilai kosong jika tidak dicentang
    }
}



    // Set initial state on page load
    document.addEventListener("DOMContentLoaded", function() {
        setMinTanggalAkhir();
        toggleTanggalSelesai();
    });

    document.getElementById('inputTanggalMulai').addEventListener('change', setMinTanggalAkhir);
    document.getElementById('stillworking').addEventListener('change', toggleTanggalSelesai);
    </script>


  </main>
@endsection
