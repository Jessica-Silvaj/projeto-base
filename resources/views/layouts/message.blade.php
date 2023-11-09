@if(Session::has('success'))
<div>
    <div class="bs-component">
      <div class="alert alert-dismissible alert-success">
        <button class="btn-close" type="button" data-bs-dismiss="alert">x</button>
        <strong>{{ Session::get('success') }}</strong>
      </div>
    </div>
</div>
@endif
