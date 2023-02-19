

@extends('backend.master')
@section('content')
<h1> This is role single view page</h1>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">


            <li class="breadcrumb-item active" aria-current="page">Role Details</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            
            <h5 class="my-3">Role ID: {{$role->id}}</h5>
            <h5 class="my-3">Role Name: {{$role->name}}</h5>
            <h5 class="my-3">Role Status: {{$role->status}}</h5>
            

          </div>
        </div>
      </div>

    
</section>
@endsection
   

