@extends('backend.layouts.master')

@section('styles')
<style>
.action{
  min-width: 70px;
}
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="breadcrumb-holder">
      <h1 class="main-title float-left">{{ __('teacher.teacher_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('teacher.teacher') }}</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-bars"> {{ __('teacher.teacher') }}</i></h2></div>
          <div class="col-md-6"><a href="{{ route('admin.teacher.create') }}" class="float-right btn btn-outline-primary"><i class="fa fa-plus"></i> {{ __('default.add_new') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="toggle-table-column">
          <strong>{{ __('default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>SL</b></a> | 
          <a href="#" class="toggle-vis" data-column="1"><b>Name</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>Roll</b></a> | 
          <a href="#" class="toggle-vis" data-column="3"><b>Student Mobile</b></a> | 
          <a href="#" class="toggle-vis" data-column="4"><b>Class</b></a> | 
          <a href="#" class="toggle-vis" data-column="5"><b>Group</b></a> | 
          <a href="#" class="toggle-vis" data-column="6"><b>Section</b></a> |
          <a href="#" class="toggle-vis" data-column="7"><b>Year</b></a> |
          <a href="#" class="toggle-vis" data-column="8"><b>Action</b></a>
        </div>
        
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th>SL</th>
              <th>Name</th>
              <th>Roll</th>
              <th>Student Mobile</th>
              <th>Class</th>
              <th>Group</th>
              <th>Section</th>
              <th>Year</th>
              <th class="action">Action</th>
            </thead>
              
            <tbody>
                <tr>
                  <td>1</td>
                  <td>S.M. Sujan</td>
                  <td>10</td>
                  <td>01402005516</td>
                  <td>Ten</td>
                  <td>Science</td>
                  <td>A</td>
                  <td>2019</td>
                  <td>
                    <a class="btn btn-info" href="{{ route('admin.teacher.show', 1) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning" href="{{ route('admin.teacher.edit', 1) }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" href="{{ route('admin.teacher.edit', 1) }}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
@endsection
