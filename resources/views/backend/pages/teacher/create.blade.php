@extends('backend.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('public/admin/assets/plugins/select2/css/select2.min.css') }}">
<style>
.jFiler-theme-default .jFiler-input {
  width: 100%;
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
        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">{{ __('teacher.teacher') }}</a></li>
        <li class="breadcrumb-item active">{{ __('default.add_new') }}</li>
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
          <div class="col-md-6"><a href="{{ route('admin.teacher.index') }}" class="float-right btn btn-outline-primary"><i class="fa fa-arrow-left"></i> {{ __('default.list') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <form class="form-horizontal" action="{{ route('admin.student.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="name">Name<span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="roll">Roll<span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="roll" id="roll" required>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="father_name">Father's Name<span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="father_name" id="father_name" required>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="mother_name">Mother's Name <span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="mother_name" id="mother_name" required>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="student_mobile">Student's Mobile</label>
              <div>
                <input type="text" class="form-control" name="student_mobile" id="student_mobile">
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="guardian_mobile">Guardian's Mobile <span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="guardian_mobile" id="guardian_mobile" required>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="dob">Date Of Birth<span class="text-danger">*</span></label>
              <div>
                {{-- <input type="text" class="form-control" name="dob" id="dob" required> --}}
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control datepicker" data-date-end-date="0d" autocomplete="off">
                    <div class="input-group-addon">
                        {{-- <span class="glyphicon glyphicon-th"></span> --}} <i class="fa fa-calendar"></i>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="religion">Religion <span class="text-danger">*</span></label>
              <div>
                <select name="religion" class="form-control" id="">
                  <option value="1">Islam</option>
                  <option value="2">Hindu</option>
                  <option value="3">Christianity</option>
                  <option value="4">Buddhists</option>
                  <option value="5">Others</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="gender">Gender<span class="text-danger">*</span></label>
              <div>
                <label><input type="radio" name="gender" id="gender" value="1">Male</label>&emsp;
                <label><input type="radio" name="gender" id="gender" value="2">Female</label>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="blood_group">Blood Group </label>
              <div>
                <select name="blood_group" class="form-control" id="blood_group">
                  <option value="A+">A+</option>
                  <option value="B+">B+</option>
                  <option value="AB+">AB+</option>
                  <option value="O+">O+</option>
                  <option value="A-">A-</option>
                  <option value="B-">B-</option>
                  <option value="AB-">AB-</option>
                  <option value="O-">O-</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="present_address">Present Address<span class="text-danger">*</span></label>
              <div>
                <textarea type="text" class="form-control" name="present_address" id="present" required></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="permanent_address">Permanent Address<span class="text-danger">*</span></label>&emsp;<label><input type="checkbox" value="">Same as present adderss.</label>
              <div>
                <textarea type="text" class="form-control" name="permanent_address" id="permanent_address" required></textarea>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="class">Class<span class="text-danger">*</span></label>
              <div>
                <select name="class" class="form-control" id="class" required>
                  <option value="One">One</option>
                  <option value="Two">Two</option>
                  <option value="Three">Three</option>
                  <option value="Four">Four</option>
                  <option value="Five">Five</option>
                  <option value="Six">Six</option>
                  <option value="Seven">Seven</option>
                  <option value="Eight">Eight</option>
                  <option value="Nine">Nine</option>
                  <option value="Ten">Ten</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="section">Section </label>
              <div>
                <select name="section" class="form-control" id="section">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="group">Group </label>
              <div>
                <select name="group" class="form-control" id="">
                  <option value="Science">Science</option>
                  <option value="Arts">Arts</option>
                  <option value="Commerce">Commerce</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="year">Year <span class="text-danger">*</span></label>
              <div>
                <select name="year" class="form-control year" id="year" required>
                  @php
                  $start = date('Y') - 15;
                  $end = date('Y');
                  @endphp
                  @for($start; $start <= $end; $start++)
                  <option value="{{ $start }}">{{ $start }}</option>
                  @endfor
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="shift">Shift </label>
              <div>
                <select name="shift" class="form-control" id="shift">
                  <option value="1">Morning</option>
                  <option value="2">Day</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="status">Type <span class="text-danger">*</span></label>
              <div>
                <select name="status" class="form-control" id="status" required>
                  <option value="Regular">Regular</option>
                  <option value="Irregular">Irregular</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="fourth_subject">4 <sup>th</sup>Subject </label>
              <div>
                <select name="fourth_subject" class="form-control" id="fourth_subject">
                  <option value="Biology">Biology</option>
                  <option value="Higher Math">Higher Math</option>
                  <option value="Agriculture Studies">Agriculture Studies</option>
                  <option value="Computer Science">Computer Science</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Student Photo <span class="text-danger">*</span></label>
              <div>
                <input type="file" style="width: 100%;" name="photo[]" id="filer_example2">
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary float-right">{{ __('default.submit') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/admin/assets/plugins/select2/js/select2.min.js') }}"></script>
<script>
  $(document).ready(function(){
    $.fn.datepicker.defaults.format = "dd/mm/yyyy";
    $('.datepicker').datepicker({
        startDate: '-3d'
    });

    $('.year').select2();

  // for input file
  'use-strict';

  $('#filer_example2').filer({
    limit: 1,
    maxSize: 3,
    extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
    changeInput: true,
    showThumbs: true,
    addMore: true
  });

  $('input[name="dob"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    format: 'YYYY-MM-DD'
  });
});
</script>
@endsection
