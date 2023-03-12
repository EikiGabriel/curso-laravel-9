@extends('layout.app')

@section('title', 'Editar o Comentario do {{$user->name}}')

@section('content')
<h1>Editar Usuario {{$user->name}}</h1>

 @include('includes.validations-form')


<form action="{{ route('comments.update' , $comment->id)}}" method="post">
    @method('PUT')
    @include('users.comments._partials.form')
</form>

@endsection
