<div class="left main-sidebar">

  <div id="fix-sidebar" class="sidebar-inner leftscroll">

    <div data-simplebar style="/*!height: 100%; overflow-x: hidden; overflow-y: scroll;*/">
      <div id="sidebar-menu">
        <ul>

          <li class="submenu">
            <a class="{{ Route::is('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}"><i class="fa fa-fw fa-dashboard"></i><span> {{ __('sidebar.dashboard') }} </span> </a>
          </li>

          @php 
          // retrieve all menus for authenticated user 
          $role_wise_menus = \App\Models\Role::where('role', Auth()->guard('admin')->user()->admin_role)->first();
          // decode menus and submenus
          $role_menus = json_decode($role_wise_menus->menu);
          $role_sub_menus = json_decode($role_wise_menus->sub_menu);
          @endphp

          @foreach($role_menus as $role_menu)
          @php 
          // retrieve row for the menu_id
          $menu = \App\Models\Menu::roleMenu($role_menu);
          @endphp

          {{-- if it is the menu (not submenu) --}}
          @if(is_null($menu->parent_id))
          <li class="submenu">
            {{-- if it is the main menu (not submenu) --}}
            @if($menu->url)
            <a href="{{ route($menu->route) }}" class="{{ Route::is($menu->route) ? 'active' : '' }}"><i class="{{ $menu->icon }}"></i> <span>
              @if(Config::get('app.locale') == 'en')
              {{ $menu->menu }}
              @else
              {{ $menu->menu_bn }}
              @endif
            </a>
            @else
            <a href="#" class="
            @foreach($menu->submenus as $menu_submenus)
            {{ Route::is($menu_submenus->route) ? 'active' : '' }}
            @endforeach
            ">
            <i class="{{ $menu->icon }}"></i> 
            <span> 
              @if(Config::get('app.locale') == 'en')
              {{ $menu->menu }} 
              @else
              {{ $menu->menu_bn }} 
              @endif
            </span> 
            <span class="menu-arrow"></span></a>
            @endif
            <ul class="list-unstyled">
              {{-- loop for all submenus of this menu --}}
              @foreach($menu->submenus as $submenu)
              @if(\App\Models\Menu::existForRole($submenu->id, $role_sub_menus))
              <li>
                <a href="{{ route($submenu->route) }}" class="{{ Route::is($submenu->route) ? 'active-submenu' : '' }}"><i class="{{ $submenu->icon }}"></i>
                  @if(Config::get('app.locale') == 'en')
                    {{ $submenu->menu }}
                  @else
                    {{ $submenu->menu_bn }}
                  @endif
                </a>
              </li>
              @endif
              @endforeach
            </ul>
          </li>
          @endif
          @endforeach

          <li class="submenu">
            <a href="#" class="{{ (Route::is('admin.menu.index') || Route::is('admin.menu.create') || Route::is('admin.menu.edit')) ? 'active' : '' }}"><i class="fa fa-fw fa-bars"></i> <span> {{ __('sidebar.menu') }} </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled">
              <li><a href="{{ route('admin.menu.index') }}" class="{{ Route::is('admin.menu.index') ? 'active-submenu' : '' }}">{{ __('sidebar.menu_list') }} </a></li>
              <li><a href="{{ route('admin.menu.create') }}" class="{{ Route::is('admin.menu.create') ? 'active-submenu' : '' }}">{{ __('sidebar.add_menu') }}</a></li>
            </ul>
          </li>

         {{--  <li class="submenu">
            <a class="" href="{{ route('admin.chart') }}"><i class="fa fa-fw fa-area-chart"></i><span> Chart </span> </a>
          </li>

          <li class="submenu">
            <a class="" href="{{ route('admin.form') }}"><i class="fa fa-fw fa-area-chart"></i><span> Form </span> </a>
          </li>

          <li class="submenu">
            <a class="" href="{{ route('admin.table') }}"><i class="fa fa-fw fa-area-chart"></i><span> Table </span> </a>
          </li>

          <li class="submenu">
            <a href="#"><i class="fa fa-fw fa-home"></i> <span> Menu </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled">
              <li><a href="">Submenu 1 </a></li>
              <li><a href="">Submenu 2 </a></li>
            </ul>
          </li>

          <li class="submenu">
            <a href="#"><span class="label radius-circle bg-primary float-right"></span><i class="fa fa-fw fa-indent"></i><span><span class="menu-arrow"></span> Menu Levels </span></a>
            <ul>
              <li>
                <a href="#"><span>Second Level</span></a>
              </li>
              <li class="submenu">
                <a href="#"><span>Third Level</span> <span class="menu-arrow"></span> </a>
                <ul style="">
                  <li><a href="#"><span>Third Level Item</span></a></li>
                  <li><a href="#"><span>Third Level Item</span></a></li>
                </ul>
              </li>                                
            </ul>
          </li> --}}

        </ul>
      </div>

      <div class="clearfix"></div>

    </div>

    <div class="clearfix"></div>

  </div>

</div>
