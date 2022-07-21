@extends('layouts.app')

@section('title', 'Listagem do Usuário')

@section('content')
    <button><a href="http://localhost:8989/users">HOME</a></button>
    <h1>Listagem do Usuário</h1>

    <ul>
        <li>{{$user->name}}</li>
        <li>{{$user->email}}</li>
    </ul>

    <form action="{{route('users.delete', $user->id)}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Deletar</button>
    </form>
@endsection
