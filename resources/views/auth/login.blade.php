<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>{{ config('app.name') }} | Administrador</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       <meta name="csrf-token" content="{{ csrf_token() }}" />
  		<meta name="base-url" content="{{ url('/') }}" />
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
      <div class="login-box-body" id="app">        
            <login inline-template>
            </login>
          <br>
         
      </div>
    </div>
<!-- /.login-box -->
	<script src="{{ url('mng/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
	<script src="{{ asset('js/app.js')}}"></script>
  </body>
</html>

