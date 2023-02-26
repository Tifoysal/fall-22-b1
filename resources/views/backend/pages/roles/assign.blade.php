@extends('backend.master')

@section('content')
<div>
<h1 style="text-align:center; margin:20px;font-weight:bold; font-size: 30px;">Create New Permission</h1>

<p style="font-weight:bold;">Admin</p>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Category
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Brand
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Product
  </label>
</div>
</div>


@endsection