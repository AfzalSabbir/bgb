@extends('backend.layouts.master')

@section('styles')
    <style>
        .col-form-label {
            font-weight: 700;
        }
        .col-form-label span {
            font-weight: 400;
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
        <li class="breadcrumb-item"><a href="{{ route('admin.teacher.index') }}">{{ __('teacher.teacher') }}</a></li>
        <li class="breadcrumb-item active">{{ __('default.view') }}</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
                <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-fluid" src="{!! asset('public/admin/assets/images/2b8ce5d5-canon-powershot-g3-x-sample-images-1.jpg') !!}" alt="">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Name : <span>S.M. Sujon</span></label><br>
                                        <label class="col-form-label">Father's Name : <span>Shah Mostafa</span></label><br>
                                        <label class="col-form-label">Student's Mobile : <span>01402005516</span></label><br>
                                        <label class="col-form-label">Date Of Birth : <span>26.03.1996</span></label><br>
                                        <label class="col-form-label">Gender : <span>Male</span></label><br>
                                        <label class="col-form-label">Present Address : <span>22, cornation road, sankipara, mymensingh</span></label><br>
                                        <label class="col-form-label">Class : <span>Ten</span></label><br>
                                        <label class="col-form-label">Group : <span>Science</span></label><br>
                                        <label class="col-form-label">Shift : <span>Day</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Roll : <span>10</span></label><br>
                                        <label class="col-form-label">Mother's Name : <span>Khatun</span></label><br>
                                        <label class="col-form-label">Guardian's Mobile : <span>01402005516</span></label><br>
                                        <label class="col-form-label">Religion : <span>Islam</span></label><br>
                                        <label class="col-form-label">permanent Address : <span>22, cornation road, sankipara, mymensingh</span></label><br>
                                        <label class="col-form-label">Section : <span>A</span></label><br>
                                        <label class="col-form-label">Year : <span>2019</span></label><br>
                                        <label class="col-form-label">Type : <span>Regular</span></label><br>
                                        <label class="col-form-label">4 <sup>th</sup> Subject : <span>Biology</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection

