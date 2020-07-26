@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="breadcrumb-holder">
      <h1 class="main-title float-left">Dashboard</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
    <div class="card-box noradius noborder bg-default">
      <i class="fa fa-user-o float-right text-white"></i>
      <h6 class="text-white text-uppercase m-b-20">Total </h6>
      <h1 class="m-b-20 text-white counter">20</h1>
    </div>
  </div>

  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
    <div class="card-box noradius noborder bg-danger">
      <i class="fa fa-user-o float-right text-white"></i>
      <h6 class="text-white text-uppercase m-b-20">Total </h6>
      <h1 class="m-b-20 text-white counter">20</h1>
    </div>
  </div>

  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
    <div class="card-box noradius noborder bg-danger">
      <i class="fa fa-user-o float-right text-white"></i>
      <h6 class="text-white text-uppercase m-b-20">Total </h6>
      <h1 class="m-b-20 text-white counter">20</h1>
    </div>
  </div>
</div>
@endsection