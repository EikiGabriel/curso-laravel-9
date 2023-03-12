@extends('layout.app')

@section('title', 'Comentarios do Usuario {$user->name}')

@section('content')
<h1>
    Comentarios do Usuario {{$user->name}}
    <a href="{{route('comments.create', $user->id)}}">+</a>
</h1>

<form action="{{route('comments.index', $user->id)}}" method="get">
    <input type="text" name="search" placeholder="Pesquisar">
    <button>Pesquisar</button>
</form>

<ul>
    @foreach($comments as $comment)   
    <li>
        {{ $comment->body}}
        {{ $comment->visible}}
        | <a href="{{ route('users.show', $user->id)}}">Detalhes</a>
        | <a href="{{ route('comments.edit', ['user'=> $user->id, 'id' => $comment->id])}}">Editar</a>
    </li>
    @endforeach
</ul>
@endsection
