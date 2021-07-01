<!DOCTYPE html>

<html lang="es">

<head>

     <meta charset="utf-8">

     <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <title>Administrador {{ config('app.name') }} </title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="base-url" content="{{ url('/') }}" />
  <!-- Bootstrap 3.3.6 -->

  <link rel="stylesheet" href="{{ url('mng/css/bootstrap.min.css') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ url('mng/dist/css/AdminLTE.min.css') }}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="{{ url('mng/dist/css/skins/_all-skins.min.css') }}">

  <!-- Date Picker -->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="{{ url('mng/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ url('css/sweet_alert.css') }}">
  <link rel="stylesheet" href="{{ url('mng/css/sortable.css') }}">
  <link rel="stylesheet" href="{{ url('mng/css/my_styles.css') }}">


  @stack('css')


</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">



  <header class="main-header">

    <!-- Logo -->

    <a href="{{url('/')}}" class="logo" target="_blank">

      <span >{{config('app.name')}}</span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>



      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

        

          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="{{url('/mng/img/icon_user.png')}}" class="user-image">

              <span class="hidden-xs">{{ auth()->user()->name }}</span>

            </a>

            <ul class="dropdown-menu">

              <!-- User image -->

              <li class="user-header">

                <img src="{{url('/mng/img/icon_user.png')}}" class="img-circle">



                <p>

                  {{ auth()->user()->name }}

                </p>

              </li>

              <!-- Menu Body -->

              <!-- Menu Footer-->

              <li class="user-footer">

                <div class="pull-left">

                </div>

                <div class="pull-right">

                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Salir</a>

                </div>

              </li>

            </ul>

          </li>

         

        </ul>

      </div>

    </nav>

  </header>

  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image" style="min-height: 25px;">
        </div>
        <div class="pull-left info">
          <a href="{{url('/')}}" style="font-size:16px;margin-left:-12%;" target="_blank">Ir al sitio</a>
        </div>
      </div>
      @include('_partials.menu')
    </section>
  </aside>
   <div class="content-wrapper">
      @yield('content')
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> {{config('app.version_laravel')}}
    </div>
    <strong>{{config('app.name')}}
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 2.2.3 -->
<script src="{{ url('mng/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('js/app.js')}}"></script>
{{-- <script src="{{ url('mng/js/backend.js') }}"></script> --}}

<!-- jQuery UI 1.11.4 -->

<script src="{{ url('mng/js/jquery.ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>

  $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.6 -->

<script src="{{ url('mng/js/bootstrap.min.js') }}"></script>

<script src="{{ url('mng/dist/js/app.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ url('mng/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ url('js/sweetalert.min.js') }}"></script>
<script src="{{ url('mng/js/my_scripts.js') }}"></script>

<script src="{{ url('mng/tinymce/tinymce.min.js') }}"></script>

<script>

  var baseRoot = "{{ url('/') }}";  
  var token = "{{ csrf_token() }}";
  $(document).on('click', '.btn-delete', function(event) {
      event.preventDefault();
      var table = $(this).data('table');
      var name = $(this).data('name');
      var obj = $(this);
      swal({
            title:"¿Está seguro de eliminar " + table + "?",
            text:'<span style="font-size:25px;font-weight:bold; color : #3c8dbc">' + name + ' </span>',
            html: true,
            showCancelButton:true,        
            confirmButtonColor: '#dd4b39',
            cancelButtonColor:"#0093ce",
            confirmButtonText: "Si",
            cancelButtonText: "No",
            },
            function(isConfirm){
                if (isConfirm) {
                  obj.parent().submit();
                }
              }
      );    
    });
</script>
@stack('js')
</body>

</html>

