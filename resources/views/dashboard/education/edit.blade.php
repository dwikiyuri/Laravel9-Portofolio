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
              <form action="{{ route('education.update', $id) }}" method="POST" >
                @csrf
                @method('put')
                <div class="row mb-3">
                  <label for="inputJudul" class="col-sm-2 col-form-label">Posisi</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $judul }}" class="form-control" id="inputText" name="judul">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputInfo1" class="col-sm-2 col-form-label">Faculty</label>
                    <div class="col-sm-4">
                      <input placeholder="Faculty Of Engineering"   type="text" value="{{ $info1 }}" class="form-control" id="inputInfo1" name="info1">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputInfo1" class="col-sm-2 col-form-label">Study Program</label>
                    <div class="col-sm-4">
                      <input placeholder="Informatics Engineer"  type="text" value="{{ $info2 }}" class="form-control" id="inputInfo1" name="info2">
                    </div>
                    <label for="inputInfo1" class="col-sm-1 col-form-label">IPK</label>
                    <div class="col-sm-2">
                      <input placeholder="4.00"  type="text" value="{{ $info3 }}" class="form-control" id="inputInfo1" name="info3">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputTanggalMulai" class="col-sm-2 col-form-label">Tanggal mulai</label>
                    <div class="col-sm-3">
                      <input   type="date" value="{{ $tanggalmulai }}" class="form-control" id="inputTanggalMulai" onchange="setMinTanggalAkhir()" name="tanggalmulai">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputTanggalSelesai" class="col-sm-2 col-form-label">Tanggal selesai</label>
                    <div class="col-sm-3">
                      <input   type="date" value="{{ $tanggalakhir }}" class="form-control" id="inputTanggalSelesai" name="tanggalakhir">
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="stillworking" name="still"  {{ $still ? 'checked' : '' }}>
                        <label class="form-check-label" for="stillworking">Still Educated</label>
                      </div>
                  </div>
                </div>

                <input type="hidden" id="hiddenStillWorking" name="stillworking" value="{{ $still }}">
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


@endsection
