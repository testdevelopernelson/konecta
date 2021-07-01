@extends('layouts.admin')



@section('content')

<style type="text/css" media="screen">

  .ui-sortable-helper {

    display: table;

}

#sortable tr:hover{

 cursor: pointer;

}

</style>

<!-- Content Header (Page header) -->

@include('admin._partials.messages')

    <section class="content-header">

    

      <h1>Servicios</h1>

      <br>

      <a href=" {{ route($name.'.create') }} " class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>



    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">       

          <div class="box">

            <div class="box-header">             

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>Orden</th>
                  <th>Servicio</th>
                  <th>Tours</th>
                  <th>Acciones</th>
                </tr>

                </thead>



                <tbody id="sortable">

               @foreach($records as $item)

                <tr id="{{ $item->id }}">

                  <td class="drag-handle"> <a href="#"><i class="fa fa-arrows fa-2x"></i></a></td>
                 <td>{!! $item->name_es !!}</td>

                 <td><a href="{{ route('tours.index' , ['s'=>$item->id]) }}" class="btn btn-primary btn-flat"><i class="fa fa-bars"></i></a></td>

                 <td><a href="{{ route($name.'.edit' , [$item->id]) }}" class="btn btn-primary btn-flat" title="Editar"><i class="fa fa-edit"></i></a>

                  <form action="{{route($name.'.destroy' , [$item->id])}}" method="POST" style="display:inline;">@csrf 

                    @method('DELETE')<buttton  type="submit" class="btn btn-danger btn-flat btn-delete" title="Eliminar"><i class="fa fa-trash"></i></buttton></form>

                 </td>

                </tr>

                @endforeach

                

              </tbody>

               

              

              </table>



            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

                  

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

    </section>

@endsection
@section('js')

<script>

  $(function() {



     $(document).on('click', '.btn-delete', function(event) {

     event.preventDefault();

      var r = confirm("¿Desea eliminar este registro?");

     if(r == true){

      $(this).parent().submit();

     }

    });



     });

</script>

<script>

  $(function() {

    $( "#sortable" ).sortable({

       handle: '.drag-handle',

       update : function (event , ui){



        updateOrder(ui.item.index());

       }

    });

    $( "#sortable" ).disableSelection();

  });



  function updateOrder(order){

var dataIds = $("#sortable").sortable("toArray");

$.ajax({
  url: baseRoot + '/admin/ajax/order_service',
  type: 'POST',
  dataType: 'json',
  async : false,
  data: {data_images : dataIds , order : order , "_token": "{{ csrf_token() }}" },
  beforeSend: function(){
   $("#sortable").css('opacity','0.6');
  },
  success: function(response){
    $("#sortable").css('opacity','1');
  },
  error:function(){
   $("#sortable").css('opacity','1');
  }
});

}

</script>

@endsection