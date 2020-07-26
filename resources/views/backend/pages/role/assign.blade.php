@extends('backend.layouts.master')

@section('styles')
<style type="text/css">
.methods > .each_method{
  float: left;
  width: 184px;
  padding: 2px 0;
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
        <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">{{ __('access.role') }}</a></li>
        <li class="breadcrumb-item active">{{ __('access.assign') }}</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="card col-md-12">
    <div class="card-header">
      <i class="fa fa-cog"> {{ __('access.role') }}</i>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.role.store') }}" method="post">
        @csrf
        <input type="hidden" name="role_type" value="{{ $role }}">
        <table class="table table-bordered">
          <thead>
            <th>{{ __('menu.menu') }}</th>
            <th>{{ __('menu.submenu') }}</th>
          </thead>
          <tbody>
            @php
              if(!is_null($role_wise)){
                $role_wise_menus = json_decode($role_wise->menu);
                $role_wise_sub_menus = json_decode($role_wise->sub_menu);
              }
              else{
                $role_wise_menus = array();
                $role_wise_sub_menus = array();
              }
            @endphp
            @foreach($menus as $menu)
            @if(is_null($menu->parent_id))
            <tr>
              <td> 
                <input type="checkbox" class="select_all" name="menu[]" id="menu{{ $menu->id }}" value="{{ $menu->id }}" {{ \App\Models\Role::checkedMenu($menu->id, $role_wise_menus) }}> 
                  @if(Config::get('app.locale') == 'en')
                    {{ $menu->menu }}
                  @else
                    {{ $menu->menu_bn }}
                  @endif
              </td>
              <td class="methods">
                @foreach($menu->submenus as $submenu)
                <div class="each_method">
                  <input type="checkbox" name="submenu[]" id="submenu{{ $submenu->id }}" value="{{ $submenu->id }}" {{ \App\Models\Role::checkedMenu($submenu->id, $role_wise_sub_menus) }}> 
                  @if(Config::get('app.locale') == 'en')
                    {{ $submenu->menu }}
                  @else
                    {{ $submenu->menu_bn }}
                  @endif
                </div>
                @endforeach
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
        <button type="submit" class="btn btn-success float-right" id="button">{{ __('default.save') }}</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function () {
    // $('.select_all').prop('checked', true);
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
