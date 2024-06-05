@extends('dashboard.layout')

@section('konten')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Halaman</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">   {{ Breadcrumbs::render('dashboard.skill.index') }}</li>
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
              <form action="{{ route('skill.update')}}" method="POST" >
                @csrf

                <div class="row mb-3">
                  <label for="skill" class="col-sm-3 col-form-label">PROGRAMMING LANGUANGE AND TOOLS</label>
                  <div class="col-sm-8">
                    <input type="text" value="{{ get_meta_value('_programl')}}" class="form-control skill" id="skill" name="_programl">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">WORKFLOW</label>
                  <div class="col-sm-10">
                    <textarea type="text"  rows="5" class="form-control summernote" id="inputEmail" name="_workflow">{{ get_meta_value('_workflow')}}</textarea>
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
    <style>
        .tokenfield .token {
            margin: -1px 1px 1px 1px;
            height: 25px;
            line-height: 22px;
            color: #fff;
            background-color: #ec8e0b
        }

        .tokenfield .token a {
            color: #FFFFFF;
            text-decoration: none;
        }
    </style>
    @push('scriptskill')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
    @endpush

  </main>


@endsection
