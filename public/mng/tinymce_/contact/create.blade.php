@extends('layouts.admin')

@section('content')
<section class="content-header"></section>
<section class="content">

   <div class="row">

    <div class="col-md-9 col-md-offset-2">

	 <div class="box box-info">

	       

            <div class="box-header with-border">

              <h3 class="box-title">Nuevo servicio</h3>

            </div>



            <!-- /.box-header -->

            <!-- form start -->

            <form action="{{ route($name.'.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">   

              @csrf

              <div class="box-body">             

            <div class="nav-tabs-custom">

              <ul class="nav nav-tabs">

              <li class="active">
                <a href="#tab_1" data-toggle="tab">Español</a>
              </li>
              <li class="">
                <a href="#tab_2" data-toggle="tab">Inglés</a>
              </li>
              <li class="">
                <a href="#tab_3" data-toggle="tab">Francés</a>
              </li>                     

            </ul>   

            <div class="tab-content">

              <div class="tab-pane active fade in active" id="tab_1">

              <label>Servicio</label>

              <textarea type="text" name="name_es" class="tinymce" value="{{ old('name_es')}}" ></textarea>
              @if ($errors->has('name_es'))
                   <label class="text-red">{{ $errors->first('name_es') }}</label>
                @endif

              <br>                

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane fade" id="tab_2">

              <label>Servicio</label>

              <textarea type="text" name="name_en" class="tinymce" value="{{ old('name_en')}}" ></textarea>
              @if ($errors->has('name_en'))
                   <label class="text-red">{{ $errors->first('name_en') }}</label>
                @endif

              <br>

              </div>     

              <!-- /.tab-pane -->

              <div class="tab-pane fade" id="tab_3">

              <label>Servicio</label>

              <textarea type="text" name="name_fr" class="tinymce" value="{{ old('name_fr')}}" ></textarea>
              @if ($errors->has('name_fr'))
                   <label class="text-red">{{ $errors->first('name_fr') }}</label>
                @endif

              <br>

              </div>  



                           

            </div>

            <!-- /.tab-content -->

          </div>

             

              </div>

              <!-- /.box-body -->

              <div class="box-footer">

                <a href="{{ route($name.'.index') }}" class="btn btn-default">Cancelar</a>

                <button type="submit" class="btn btn-success pull-right">Guardar</button>

              </div>

              <!-- /.box-footer -->

            </form>

          </div>

      </div>

   </div>

</section>



@endsection