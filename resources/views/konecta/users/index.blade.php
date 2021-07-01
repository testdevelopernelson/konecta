@extends('layouts.master')

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
    <section class="content-header">
      <h1>{{ $plural }}</h1>      
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
              <div class="pull-right">
                <a href=" {{ route($name.'.create', ['token' => $token]) }} " class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th class="w-15 actions">Acciones</th>
                </tr>
                </thead>

              <tbody>
               @foreach($records as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td class="btn-actions-index">
                    <a href="{{ route($name.'.edit' , ['token' => $token, $item->id]) }}" class="btn btn-primary btn-flat" title="Editar"><i class="fa fa-edit"></i></a>
                    @if (auth()->user()->id != $item->id)
                       <form action="{{route($name.'.delete')}}" method="POST" style="display:inline;">@csrf 
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <buttton  type="submit" class="btn btn-danger btn-flat btn-delete" title="Eliminar" data-name = '{{ $item->name }}' data-table = 'este cliente'><i class="fa fa-trash"></i></buttton> </form>
                    @endif
                    
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