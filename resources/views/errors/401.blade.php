@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('content')
<section class="error">
    <div class="error_cnt">
        <h1>¡ups!</h1>
        <h1>El oken a expirado </h1>
        <a href="{{ url('/') }}" class="btn">Iniciar sesión</a>
    </div>
</section>
@endsection
