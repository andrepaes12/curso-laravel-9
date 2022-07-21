@extends('layouts.app')

@section('title', "Editar {$user->name}")

@section('content')
    <button><a href="http://localhost:8989/users">HOME</a></button>
    <h1>Editar Usuário</h1>

    {{-- error msg --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        {{-- método para permitir a edição --}}
        @method('PUT')

        {{-- método para aumentar a segurnaça dos dados nas requisições --}}
        @csrf

        {{-- value = persistir os dados --}}
        <input type="text" name="name" id="" placeholder="Nome do Usuário" value="{{$user->name}}">
        <input type="email" name="email" id="" placeholder="E-mail do Usuário" value="{{$user->email}}">
        <input type="password" name="password" id="" placeholder="Senha do Usuário">
        <input type="file" name="image" id="">
        <input type="submit" value="Enviar">
    </form>
@endsection
