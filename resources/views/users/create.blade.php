@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
    <h1>Cadastro de Usuário</h1>

    {{-- error msg --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- value = persistir os dados --}}
        <input type="text" name="name" id="" placeholder="Nome do Usuário" value="{{old('name')}}">
        <input type="email" name="email" id="" placeholder="E-mail do Usuário" value="{{old('email')}}">
        <input type="password" name="password" id="" placeholder="Senha do Usuário">
        <input type="file" name="image" id="">
        <input type="submit" value="Enviar">
    </form>
@endsection
