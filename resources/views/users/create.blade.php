@extends('layout.app')

@section('title', 'Criar Usuario')

@section('content')
<h1>Novo Usuario</h1>

@include('includes.validations-form')


<form action="{{route('users.store')}}" method="post">
    @csrf
    @include('users._partials.form')
</form>

@endsection
