@extends('dashboard.layout')

@section('konten')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Halaman</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">   {{ Breadcrumbs::render('dashboard.profile.index') }}</li>
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
              <form action="{{ route('profile.update')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @if(get_meta_value('foto'))
                <div class="row mb-3">
                    <img src="{{asset('foto')."/".get_meta_value('foto')}}" style="max-width:100px;maxheight:100px" alt="">
                  </div>
                @endif

                <div class="row mb-3">
                  <label for="foto" class="col-sm-2 col-form-label">Photo Profile</label>
                  <div class="col-sm-4">
                    <input type="file" value="" class="form-control" id="foto" name="foto">

                  </div>
                </div>
                <div class="mb-3">
                    <h5 class="card-title">Addres & Contact</h5>
                </div>
                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">PROVINSI</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="provinsi" name="provinsi">
                            <option value="{{get_meta_value('[provinsi]')}}">Pilih Provinsi</option>
                            @foreach($regions as $region)
                                            <option value="{{ $region['provinsi'] }}" {{ get_meta_value('provinsi') == $region['provinsi'] ? 'selected' : '' }}>
                                                {{ $region['provinsi'] }}
                                            </option>
                                        @endforeach
                        </select>
                    </div>
                    <label for="kota" class="col-sm-1 col-form-label">KOTA</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="kota" name="kota" >
                            <option value="{{get_meta_value('kota')}}">Pilih Kota</option>
                            <!-- Kota akan diisi oleh JavaScript -->
                        </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="ttl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" value="{{get_meta_value('ttl')}}" class="form-control skill" id="ttl" name="ttl">
                        </div>
                  </div>
                  <div class="row mb-3">
                    <label for="telp" class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-4">
                      <input type="text" value="{{get_meta_value('telp')}}" class="form-control skill" id="telp" name="telp">
                    </div>
                    <label for="email" class="col-sm-1 col-form-label">EMAIL</label>
                        <div class="col-sm-4">
                            <input type="email" value="{{get_meta_value('email')}}" class="form-control skill" id="email" name="email">
                        </div>
                  </div>
                  <div class="mb-3">
                    <h5 class="card-title">Media Social <span class="text-primary">(Input Link)</span></h5>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 ">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="instagram"><i class="bi bi-instagram"></i></span>
                            <input value="{{get_meta_value('instagram')}}" type="text" class="form-control" placeholder="instagram" aria-label="instagram" aria-describedby="instagram" name="instagram">
                          </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="Linkedin"><i class="bi bi-linkedin"></i></span>
                            <input value="{{get_meta_value('linkedin')}}" type="text" class="form-control" placeholder="Linkedin" aria-label="Linkedin" aria-describedby="Linkedin" name="linkedin">
                          </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="Linkedin"><i class="bi bi-file-earmark-person"></i></span>
                            <input placeholder="Curiculum Vitae" value="{{get_meta_value('cv')}}" type="file" class="form-control" placeholder="Linkedin" aria-label="Linkedin" aria-describedby="Linkedin" name="curiculumV">
                          </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="Twitter"><i class="bi bi-twitter"></i></span>
                            <input value="{{get_meta_value('twitter')}}" type="text" class="form-control" placeholder="Twitter" aria-label="Twitter" aria-describedby="Twitter" name="twitter">
                          </div>
                    </div>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="Github"><i class="bi bi-github"></i></span>
                                <input value="{{get_meta_value('github')}}" type="text" class="form-control" placeholder="Github" aria-label="Github" aria-describedby="Github" name="github">
                              </div>
                        </div>
                        @if(get_meta_value('cv'))
                        <div class="col-sm-4">
                            <a href="{{ route('profile.cv') }}" target="_blank" class="btn btn-primary">Preview CV</a>
                        </div>
                    @endif
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
  @push('scriptregion')
  <script>
    $(document).ready(function() {
        const regions = @json($regions);
        const selectedProvinsi = "{{ get_meta_value('provinsi') }}";
        const selectedKota = "{{ get_meta_value('kota') }}";

        function populateKota(provinsi) {
            const $kotaSelect = $('#kota');
            $kotaSelect.empty();
            $kotaSelect.append('<option value="">Pilih Kota</option>');

            const selectedRegion = regions.find(region => region.provinsi === provinsi);
            if (selectedRegion) {
                selectedRegion.kota.forEach(function(kota) {
                    const isSelected = kota === selectedKota ? 'selected' : '';
                    $kotaSelect.append(`<option value="${kota}" ${isSelected}>${kota}</option>`);
                });
            }
        }

        $('#provinsi').on('change', function() {
            const provinsi = $(this).val();
            populateKota(provinsi);
        });

        // Populate kota on page load if provinsi is selected
        if (selectedProvinsi) {
            populateKota(selectedProvinsi);
        }
    });
</script>

    @endpush

@endsection
