@extends('backend.layouts.master')

@section('styles')
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
      <h1 class="main-title float-left">{{ __('student.student_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">{{ __('student.student') }}</a></li>
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
          <div class="col-md-6"><h3><i class="fa fa-bars"></i>&nbsp;&nbsp; {{ __('student.edit_student') }}</h3></div>
          <div class="col-md-6"><a href="{{ route('admin.student.index') }}" class="float-right btn btn-outline-primary"><i class="fa fa-arrow-left"></i> {{ __('default.list') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <form class="form-horizontal" action="{{ route('admin.menu.store') }}" method="post">
          @csrf
          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Name<span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="menu" id="menu" required>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Roll<span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="roll" id="roll" required>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Father's Name<span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="father_name" id="father_name" required>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Mother's Name <span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="mother_name" id="mother_name" required>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Student's Mobile<span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="student_mobile" id="student_mobile" required>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Guardian's Mobile <span class="text-danger">*</span></label>
              <div>
                <input type="text" class="form-control" name="guardian_mobile" id="guardian_mobile" required>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Date Of Birth<span class="text-danger">*</span></label>
              <div>
                <div class="input-group date" data-provide="datepicker">
                  <input type="text" class="form-control" autocomplete="off">
                  <div class="input-group-addon">
                      {{-- <span class="glyphicon glyphicon-th"></span> --}} <i class="fa fa-calendar"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Religion <span class="text-danger">*</span></label>
              <div>
                <select name="religion" class="form-control" id="">
                  <option value="Islam">Islam</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Christianity">Christianity</option>
                  <option value="Buddhists">Buddhists</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Gender<span class="text-danger">*</span></label>
              <div>
                <label><input type="radio" name="gender" value="Male">Male</label>&emsp;
                <label><input type="radio" name="gender" value="Female">Female</label>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Blood Group <span class="text-danger">*</span></label>
              <div>
                <select name="blood_group" class="form-control" id="">
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
              <label class="col-form-label" for="menu">Present Address<span class="text-danger">*</span></label>
              <div>
                <textarea type="text" class="form-control" name="present_address" id="present" required></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Permanent Address<span class="text-danger">*</span></label>&emsp;<label><input type="checkbox" value="">Same as present adderss.</label>
              <div>
                <textarea type="text" class="form-control" name="permanent_address" id="permanent" required></textarea>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Class<span class="text-danger">*</span></label>
              <div>
                <select name="class" class="form-control" id="">
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
              <label class="col-form-label" for="menu">Section <span class="text-danger">*</span></label>
              <div>
                <select name="section" class="form-control" id="">
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
              <label class="col-form-label" for="menu">Group<span class="text-danger">*</span></label>
              <div>
                <select name="group" class="form-control" id="">
                  <option value="Science">Science</option>
                  <option value="Arts">Arts</option>
                  <option value="Commerce">Commerce</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Year <span class="text-danger">*</span></label>
              <div>
                <select name="year" class="form-control" id="">
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Shift<span class="text-danger">*</span></label>
              <div>
                <select name="shift" class="form-control" id="">
                  <option value="Morning">Morning</option>
                  <option value="Day">Day</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label class="col-form-label" for="menu">Type <span class="text-danger">*</span></label>
              <div>
                <select name="type" class="form-control" id="">
                  <option value="Regular">Regular</option>
                  <option value="Irregular">Irregular</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-form-label" for="menu">4 <sup>th</sup>Subject <span class="text-danger">*</span></label>
              <div>
                <select name="optional_sub" class="form-control" id="">
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
                  <input type="file" style="width: 100%;" name="student_photo" id="filer_example2" multiple="multiple">
              </div>
            </div>
          </div>

          <button type="submit" name="save_menu" class="btn btn-success float-right">{{ __('default.update') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){

  'use-strict';

    //Example 2
    $('#filer_example2').filer({
        limit: 1,
        maxSize: 3,
        extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
        changeInput: true,
        showThumbs: true,
        addMore: true
    });
});
</script>
@endsection
