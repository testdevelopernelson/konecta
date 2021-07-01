<ul class="sidebar-menu">
    <li class="header">Gestor</li>
    @hasRole('Administrador')
    	<li><a href="{{ route('users.index', ['token' => request()->get('token')]) }}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
   	@endHasRole 
    	<li><a href="{{ route('customers.index', ['token' => request()->get('token')]) }}"><i class="fas fa-images"></i> <span>Clientes</span></a></li> 
   
</ul>