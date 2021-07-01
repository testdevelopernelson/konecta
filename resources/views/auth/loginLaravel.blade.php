<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>{{ config('app.name') }} | Administrador</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="{{url('/mng/css/bootstrap.min.css')}}">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{url('/mng/dist/css/AdminLTE.min.css')}}">
      <link rel="stylesheet" href="{{url('/mng/css/my_styles.css')}}">
    </head>

  <body class="hold-transition login-page">

    <div class="login-box">
      <div class="login-logo">      
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">       
         @if (session()->has('error_login'))  
          <p class="login-box-msg" style="color:#901414;">{{ session()->get('error_login') }}</p>
          @php
            session()->forget('error_login')
          @endphp
         @endif         
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <p class="login-box-msg">{{ $errors->first('email') }}</p>
                @endif
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                  <p class="login-box-msg">{{ $errors->first('password') }}</p>
                @endif
              </div>

               <div class="form-group has-feedback">
                <label for="">Seleccionar rol</label>
               <select name="role" class="form-control">
                  <option value="Administrador">Rol Administrador</option>
                  <option value="Vendedor">Rol Vendedor</option>
               </select>
              </div>
              <div class="row">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
              </div>
            </form>
          <br>
         
      </div>
    </div>
<!-- /.login-box -->
  </body>
</html>

