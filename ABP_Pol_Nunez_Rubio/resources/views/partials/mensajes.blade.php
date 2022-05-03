@if(Session::has("error"))
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{ Session::get("error") }}
  </div>
@endif
