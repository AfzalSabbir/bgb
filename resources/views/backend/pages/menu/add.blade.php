@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="breadcrumb-holder">
      <h1 class="main-title float-left">{{ __('menu.menu_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">{{ __('menu.menu') }}</a></li>
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
          <div class="col-md-6"><h2><i class="fa fa-bars"> {{ __('menu.menu') }}</i></h2></div>
          <div class="col-md-6"><a href="{{ route('admin.menu.index') }}" class="float-right btn btn-outline-primary"><i class="fa fa-arrow-left"></i> {{ __('menu.menu_list') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <form id="myform" action="{{ route('admin.menu.store') }}" method="post">
          @csrf
          <div class="form-row">
            <div class="col-md-4 form-group">
              <label for="menu">Name (En) <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="menu" id="menu" required placeholder="menu english name">
            </div>

            <div class="col-md-4 form-group">
              <label for="menu_bn">Name (Bn) <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="menu_bn" id="menu_bn" required placeholder="menu bangla name">
            </div>

            <div class="col-md-4 form-group">
              <label for="url">URL </label>
              <input type="text" class="form-control" name="url" id="url" placeholder="menu name">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="parent_id">Parent Menu</label>
              <select name="parent_id" id="parent_id" class="form-control">
                <option value="">Select Parent Menu</option>
                @foreach($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->menu }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6 form-group">
              <label for="menu_position">Position <span class="text-danger">*</span></label>
              <select name="menu_position" id="menu_position" class="form-control" required>
                <option value="0">Sidebar</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="icon">Icon <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="icon" id="icon" placeholder="menu icon" required>
            </div>

            <div class="col-md-6 form-group">
              <label for="order">Menu Order <span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="order" id="order" placeholder="menu order" required>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="route">Route </label>
              <input type="text" class="form-control" name="route" id="route" placeholder="menu route">
            </div>

            <div class="col-md-6 form-group">
              <label for="status">Status </label>
              <select name="status" id="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Deactive</option>
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

@section('scripts')
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $('input[name=menu_bn]').avro();
      });
    </script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $('input[name=menu_bn]').avro({'bangla':true}, 
          /*function(isBangla){
            alert('Bangla enabled = ' + isBangla);
          }*/
        );
      });
    </script>
    <script>
       $(document).ready(function(){
        $('#myform').validate({ // initialize the plugin
        // rules: {
        //     menu_bn: {
        //         required: true,
        //     },
        //     menu: {
        //         required: true,
        //     }
        // },
        messages: {
          menu: "{{ __('default.required_validation') }}",
          menu_bn: "{{ __('default.required_validation') }}",
          icon: "{{ __('default.required_validation') }}",
          order: "{{ __('default.required_validation') }}",
        } 
      });
       });
    </script>
@endsection
