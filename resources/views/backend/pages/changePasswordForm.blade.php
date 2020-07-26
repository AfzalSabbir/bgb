@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="breadcrumb-holder">
      <h1 class="main-title float-left">{{ __('access.change_password') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('access.change_password') }}</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="main-body">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3 col-md-6 offset-md-3">
      <div class="card-body">
        @include('backend.partials.message')
        <form action="{!! route('admin.password.change') !!}" method="post">
          @csrf
          <div class="form-group">
            <label for="old_password">Old Password <span class="text-danger required">*</span></label>
            <input type="password" class="form-control" name="old_password" id="old_password" value="" placeholder="Your present password" required>
            @if ($errors->has('old_password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('old_password') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            <label for="password">New Password <span class="text-danger required">*</span></label>
            <input type="password" class="form-control" name="password" id="password" value="" placeholder="New password" required>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password <span class="text-danger required">*</span></label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="Confirm new password" required>
            @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
          </div>

          <button type="submit" class="btn btn-success btn-sm float-right btn-lg mt-2"><i class="fa fa-fw fa-sign-in"></i>Submit</button>
        </form>
      </div><!-- end card-->
    </div>
  </div>
</div>

@endsection
