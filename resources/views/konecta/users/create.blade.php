@extends('layouts.master')

@section('content')
<section class="content-header">

    
</section>

<section class="content">
  <div class="row">
  <div class="col-lg-9 col-md-12"> 
   <div class="box box-info">        
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo {{ $singular }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route($name.'.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="token" value="{{ $token }}">
              <div class="box-body">
             
             <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                      <a href="#tab_1" data-toggle="tab">Contenido</a>
                    </li> 
                 </ul>
                <div class="tab-content">
                  <div class="tab-pane active fade in active" id="tab_1">
                      <label>Nombre </label>
                      <input type="text" name="name" class="form-control" value="{{ old('name')}}">
                      <br>

                      <label>Correo</label>
                      <input type="text" name="email" class="form-control" value="{{ old('email')}}">
                      <br>

                      <label>Contraseña </label>
                      <input type="password" name="password" class="form-control" value="{{ old('password')}}" autocomplete="new-password">
                      <br>

                      <label>Repetir Contraseña</label>
                      <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                      <br>
                    
                  </div>
                 
                </div>
            <!-- /.tab-content -->
            </div>
             
          </div>
          </div>
      </div>

      <div class="col-lg-3 col-md-12">        
          <!-- /.box-body -->
          @include('_partials.save_cancel')
          <!-- /.box-footer -->
           </form>
      </div>
   </div>
</section>

@endsection