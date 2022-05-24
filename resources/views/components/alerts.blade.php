@if (Session::has('invalid_response'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> {{Session::get('invalid_response')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (Session::has('response'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong></strong> {{Session::get('response')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
