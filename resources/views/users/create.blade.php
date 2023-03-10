@extends('layout.app')

@section('title', 'Criar Usuario')

@section('content')
<h1>Novo Usuario</h1>

@if($errors->any()) <!-- se tiver algum erro no form, "$errors->any()" irá informar -->
    <ul class="errors">
        @foreach ($errors ->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>
@endif


<form action="{{route('users.store')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome:">
    <input type="email" name="email" placeholder="E-mail:">
    <input type="password" name="password" placeholder="Senha:">
    <button type="submit">
        Enviar
    </button>
</form>

@endsection
