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
      <h1 class="main-title float-left">{{ __('menu.menu_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('menu.menu') }}</li>
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
          <div class="col-md-6"><h2><i class="fa fa-bars"> {{ __('menu.menu') }}</i></h2></div>
          <div class="col-md-6"><a href="{{ route('admin.menu.create') }}" class="float-right btn btn-outline-primary"><i class="fa fa-plus"></i> {{ __('default.add_new') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="toggle-table-column">
          <strong>{{ __('default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>SL</b></a> | 
          <a href="#" class="toggle-vis" data-column="1"><b>Menu(En)</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>Menu(Bn)</b></a> | 
          <a href="#" class="toggle-vis" data-column="3"><b>Parent</b></a> | 
          <a href="#" class="toggle-vis" data-column="4"><b>Position</b></a> | 
          <a href="#" class="toggle-vis" data-column="5"><b>Icon</b></a> | 
          <a href="#" class="toggle-vis" data-column="6"><b>URL</b></a> |
          <a href="#" class="toggle-vis" data-column="7"><b>Route</b></a> |
          <a href="#" class="toggle-vis" data-column="8"><b>Status</b></a> |
          <a href="#" class="toggle-vis" data-column="9"><b>Action</b></a>
        </div>
        
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th>SL</th>
              <th>Menu(En)</th>
              <th>Menu(Bn)</th>
              <th>Parent</th>
              <th>Position</th>
              <th>Icon</th>
              <th>URL</th>
              <th>Route</th>
              <th>Status</th>
              <th class="action">Action</th>
            </thead>

            <tbody>
              @foreach($menus as $menu)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $menu->menu }}</td>
                <td>{{ $menu->menu_bn }}</td>
                <td>{{ $menu->parent_id ? $menu->parent->menu : 'N/A' }}</td>
                <td>{{ $menu->menu_position == 0 ? 'Sidebar' : 'N/A' }}</td>
                <td><h4><i class="{{ $menu->icon }}"></i></h4></td>
                <td>{{ $menu->url }}</td>
                <td>{{ $menu->route }}</td>
                <td>{{ $menu->status == 1 ? 'Active' : 'Deactive' }}</td>
                <td class="action">
                  <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                  <button class="btn btn-outline-danger" onClick="deleteMethod({{ $menu->id }})" role="button"><i class="fa fa-trash"></i></button>

                </td>
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
