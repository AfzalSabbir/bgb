<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Demo | Admin-Login</title>

  <link rel="shortcut icon" href="{!! asset('public/admin/assets/images/favicon.ico') !!}">

  <!-- Bootstrap CSS -->
  <link href="{!! asset('public/admin/assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />

  <!-- Font Awesome CSS -->
  <link href="{!! asset('public/admin/assets/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />

  <!-- Custom CSS -->
  <link href="{!! asset('public/admin/assets/css/style.css') !!}" rel="stylesheet" type="text/css" />

  <link href="{!! asset('public/admin/assets/css/login.css') !!}" rel="stylesheet" type="text/css" />
</head>

<body>

  <div class="card col-md-4 offset-md-4 login-margin">
    <h2 class="text-center mt-3">Admin Login</h2>

    @if ( Session::has('login_error') )
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {!! Session::get('login_error') !!}
      </div>
    @endif

    <form class="" action="{!! route('admin.login') !!}" method="post">
      @csrf
      <div class="form-group mt-3 pl-2 pr-2">
        <label for="username">Username <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="username" id="username" required autofocus>
      </div>

      <div class="form-group mt-3 pl-2 pr-2">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>

      <div class="form-group pl-2 pr-2">
        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-fw fa-sign-in"></i>Login</button>
        <a href="{{ route('admin.password.request') }}" class="float-right">Forgot Password?</a>
      </div>
    </form>
  </div>

</body>
</html>
