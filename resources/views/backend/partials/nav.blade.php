<div class="headerbar">

  <!-- LOGO -->
  <div class="headerbar-left">
    <a href="{{ route('admin.home') }}" class="logo"><img alt="Logo" src="{!! asset('public/admin/assets/images/logo.png') !!}" /> <span>Admin</span></a>
  </div>

  <nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">

      <li class="list-inline-item dropdown notif">
        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <img src="{!! asset('public/admin/assets/images/avatars/admin.png') !!}" alt="Profile image" class="avatar-rounded">
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
          <!-- item-->
          <div class="dropdown-item noti-title">
            <h5 class="text-overflow"><small>{{ __('sidebar.hello') }}, {{ Auth::guard('admin')->user()->name }}</small> </h5>
          </div>

          <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fa fa-power-off"></i> <span>{{ __('sidebar.logout') }} </span>
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>

  </ul>

  <ul class="list-inline menu-left mb-0">
    <li id="dashboard_toggle" class="float-left">
      <button class="button-menu-mobile open-left" style="margin-right: 0px;">
        <i class="fa fa-fw fa-bars"></i>
      </button>
    </li>

    <li class="float-left">
      @if(Config::get('app.locale') == 'bn')
      <a class="nav-link dropdown-toggle arrow-none" href="{{ route('language', 'en') }}" aria-haspopup="false" aria-expanded="false">
        <img src="{{ asset('public/images/flag/en.png') }}" width="30" height="30" title="Click to English">
      </a>
      @else
      <a class="nav-link dropdown-toggle arrow-none" href="{{ route('language', 'bn') }}"  aria-haspopup="false" aria-expanded="false" title="বাংলার জন্য ক্লিক করুন">
        <img src="{{ asset('public/images/flag/bn.png') }}" width="30" height="30">
      </a>
      @endif
    </li>
  </ul>

</nav>

</div>
