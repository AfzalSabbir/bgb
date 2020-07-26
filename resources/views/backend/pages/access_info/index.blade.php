@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="breadcrumb-holder">
      <h1 class="main-title float-left">{{ __('access.access_information') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('access.access_information') }}</li>
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
          <div class="col-md-6"><h2><i class="fa fa-cog"> {{ __('access.access_information') }}</i></h2></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="toggle-table-column">
          <strong>{{ __('default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>{{ __('default.sl') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="1"><b>{{ __('default.name') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>{{ __('access.ip') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="3"><b>{{ __('default.country') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="4"><b>{{ __('access.device') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="5"><b>{{ __('access.browser') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="6"><b>{{ __('default.time') }}</b></a> 
        </div>
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th>{{ __('default.sl') }}</th>
              <th>{{ __('default.name') }}</th>
              <th>{{ __('access.ip') }}</th>
              <th>{{ __('default.country') }}</th>
              <th>{{ __('access.device') }}</th>
              <th>{{ __('access.browser') }}</th>
              <th>{{ __('default.time') }}</th>
            </thead>

            <tbody>
              @foreach($infos as $info)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $info->admin->name }}</td>
                <td>{{ $info->ip }}</td>
                <td>{{ $info->country }}</td>
                <td>{{ $info->device }}</td>
                <td>{{ $info->browser }}</td>
                <td>{{ $info->created_at->diffForHumans() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
