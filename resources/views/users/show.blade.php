@extends('layout.app')

@section('content')
<h1>Listagem usuario {{$user->name}}</h1>

<ul>
    <li>
        {{$user->name}}
        {{$user->email}}
    </li>
</ul>

<form action="{{route('users.delete', $user->id)}}" method="POST">
    @method('DELETE')
    @csrf <!--Para validar o formulario-->
    <button type="submit">Deletar</button>
</form>
@endsection