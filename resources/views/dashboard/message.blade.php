@if ($errors->any())
<div class="row">
    <div class="col-lg">
        <div class="alert alert-danger alert-dismissible fade show text-bold" role="alert">
            @foreach($errors->all() as $Malert)

            <ul><li>{{ $Malert}}</li></ul>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
@if(Session::has('success'))
<div class="row">
    <div class="col-lg mt-2">
        <div class="alert alert-success alert-dismissible fade show text-bold" role="alert">
            {{ Session::get('success') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

</div>

@endif
