@if(Session::has('error'))
<div class="row mr-2 ml-2" cursor = "default">
 <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"id="type-error"  disabled>
      {{Session::get('error')}}
 </button>
 </div>

@endif
