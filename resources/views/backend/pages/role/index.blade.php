@extends('backend.layouts.master')

@section('styles')
<style type="text/css">
.methods > .each_method{
  float: left;
  width: 184px;
  padding: 10px 0;
}
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="breadcrumb-holder">
      <h1 class="main-title float-left">{{ __('access.role_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('access.role') }}</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="card col-md-12">
    <div class="card-header">
      <i class="fa fa-cog"> </i>
      {{ __('access.role') }}
    </div>
    <div class="card-body">
      @include('backend.partials.message')
      <table class="table table-bordered table-hover">
        <thead>
          <th>{{ __('default.sl') }}</th>
          <th>{{ __('access.role') }}</th>
          <th>{{ __('default.action') }}</th>
        </thead>
        <tbody>
          <tbody>
            <tr>
              <td>1</td>
              <td>Super Admin</td>
              <td><a href="{{ route('admin.role.assign', 'super-admin') }}" class="btn btn-outline-primary"><i class="fa fa-fw fa-pencil"></i></a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Admin</td>
              <td><a href="{{ route('admin.role.assign', 'admin') }}" class="btn btn-outline-primary"><i class="fa fa-fw fa-pencil"></i></a></td>
            </tr>
            <tr>
              <td>3</td>
              <td>User</td>
              <td><a href="{{ route('admin.role.assign', 'user') }}" class="btn btn-outline-primary"><i class="fa fa-fw fa-pencil"></i></a></td>
            </tr>
          </tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function () {
    $(document).on('change', '.select_all', function () {
      var change = $(this);
      $(this).closest('tr').find('.methods').find('input').each(function () {
        if (change.is(':checked')) {
          $(this).prop('checked', true);
        }
        else {
          $(this).prop('checked', false);
        }
      });
    });
  });
</script>
@endsection
