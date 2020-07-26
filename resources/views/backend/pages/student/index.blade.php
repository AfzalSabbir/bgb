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
      <h1 class="main-title float-left">{{ __('student.student_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('student.student') }}</li>
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
          <div class="col-md-6"><h2><i class="fa fa-bars"></i>&nbsp;{{ __('student.student') }}</h2></div>
          <div class="col-md-6"><a href="{{ route('admin.student.create') }}" class="float-right btn btn-outline-primary"><i class="fa fa-plus"></i> {{ __('default.add_new') }}</a></div>
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

          @php
            // Pagination Serial
          if (request()->filled('page')){
              $PreviousPageLastSN = $items*(request()->page-1); //PreviousPageLastSerialNumber
              $PageNumber = request()->page;
            }
            else{
              $PreviousPageLastSN = 0; //PreviousPageLastSerialNumber
              $PageNumber = 1;
            }

            //Last Page Items Change Restriction
            if ($PageNumber*$items > $total + $items){
              header('Location: ' . $_SERVER['HTTP_REFERER']);
              die();
            }
            @endphp

        {{-- Search Options --}}            
        <div class="container-fluid">
          <div class="row">

            @include('backend.partials.page_numbering', ['route' => 'admin.student.index'])

            <div class="col-sm-12 col-md-4 offset-md-2">
              <select name="search" id="searchField" class="form-control">
                <option selected value="disableed" disabled>Select Your Search Field</option>
                <option value="name">Name</option>
                <option value="class">Class</option>
                <option value="roll">Roll</option>
                <option value="group">Group</option>
                <option value="section">Section</option>
                <option value="year">Year</option>
              </select>
            </div>

            <div class="clearfix"></div>
          </div>

          <div id="searchForm" class="row mt-2" style="display: none; background-color: #f4f4f4;padding: 0 4px;border-radius: 3px;">
            <form class="" action="{{ route('admin.student.index') }}" method="get" style="width: 100%">
              <div class="form-row search-field">
                <div id="searchButton" style="display: none; margin: 4px 0 4px 5px;">
                  <button name="searchButton" class="fa fa-search btn btn-primary" style="float: right; height: 38px; width: 75px" type="submit"></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="{{-- table-responsive --}}" style="margin-top: 8px">
          <table id="{{-- datatable --}}" class="table table-bordered table-hover display">
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
              @foreach ($students as $student)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->roll }}</td>
                  <td>{{ $student->student_mobile }}</td>
                  <td>{{ $student->class }}</td>
                  <td>{{ $student->group }}</td>
                  <td>{{ $student->section }}</td>
                  <td>{{ $student->year }}</td>
                  <td>
                    <a class="btn btn-info" href="{{ route('admin.student.show', 1) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning" href="{{ route('admin.student.edit', 1) }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" href="{{ route('admin.student.edit', 1) }}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          @include('backend.partials.pagination', ['table' => $students])

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
@endsection
