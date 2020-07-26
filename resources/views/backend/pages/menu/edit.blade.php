@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="breadcrumb-holder">
      <h1 class="main-title float-left">{{ __('menu.menu_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">{{ __('menu.menu') }}</a></li>
        <li class="breadcrumb-item active">{{ __('default.edit') }}</li>
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
          <div class="col-md-6"><a href="{{ route('admin.menu.index') }}" class="float-right btn btn-outline-primary"><i class="fa fa-arrow-left"></i> {{ __('menu.menu_list') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <form action="{{ route('admin.menu.update', $singleMenu->id) }}" method="post">
          @csrf
          <div class="form-row">
            <div class="col-md-4 form-group">
              <label for="menu">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="menu" id="menu" placeholder="menu name" value="{{ $singleMenu->menu }}" required>
            </div>

            <div class="col-md-4 form-group">
              <label for="menu_bn">Name (Bn) <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="menu_bn" id="menu_bn" value="{{ $singleMenu->menu_bn }}" placeholder="menu bangla name" required>
            </div>

            <div class="col-md-4 form-group">
              <label for="url">URL </label>
              <input type="text" class="form-control" name="url" id="url" placeholder="menu name" value="{{ $singleMenu->url }}">
            </div>
            
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="parent_id">Parent Menu</label>
              <select name="parent_id" id="parent_id" class="form-control">
                <option value="">Select Parent Menu</option>
                @foreach($menus as $menu)
                <option value="{{ $menu->id }}"
                  @if($menu->id == $singleMenu->parent_id)
                  {{ 'selected' }}
                  @endif
                  >{{ $menu->menu }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-6 form-group">
                <label for="menu_position">Position <span class="text-danger">*</span></label>
                <select name="menu_position" id="menu_position" class="form-control" required>
                  <option value="0" {{ $singleMenu->menu_position == 0 ? 'selected' : '' }}>Sidebar</option>option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="icon">Icon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="icon" id="icon" placeholder="menu icon" value="{{ $singleMenu->icon }}" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="order">Menu Order <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="order" id="order" value="{{ $singleMenu->order }}" placeholder="menu order" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="route">Route </label>
                <input type="text" class="form-control" name="route" id="route" value="{{ $singleMenu->route }}">
              </div>

              <div class="col-md-6 form-group">
                <label for="status">Status </label>
                <select name="status" id="status" class="form-control">
                  <option value="1" {{ $singleMenu->status == 0 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ $singleMenu->status == 0 ? 'selected' : '' }}>Deactive</option>
                </select>
              </div>
            </div>

            <button type="submit" name="save_menu" class="btn btn-success float-right">{{ __('default.submit') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
