@extends('layout.app')

@section('title', 'Novo comentario de {$user->name}')

@section('content')
<h1>Novo Comentario {{$user->name}}</h1>

@include('includes.validations-form')


<form action="{{route('comments.store', $user->id)}}" method="post">
    @csrf
    @include('users.comments._partials.form')
</form>

@endsection
