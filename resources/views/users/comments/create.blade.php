@extends('layouts.app')

@section('title', "Novo comentário para o Usuário {$user->name}")

@section('content')
    <button><a href="http://localhost:8989/users/{{$user->id}}/comments/">VOLTAR</a></button>
    <h1>Novo Comentário do Usuário {{ $user->name }}</h1>

    {{-- @include('includes.validation-form') --}}
    {{-- error msg --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('comments.store', $user->id) }}" method="POST">
        {{-- @include('users.comments._partials.form') --}}
        @csrf
        {{-- value = persistir os dados --}}
        <textarea name="body" id="" cols="30" rows="10" placeholder="Comentário"></textarea><br>
        <label for="visible"><input type="checkbox" name="visible"> Visível?</label>
        <button type="submit">Enviar</button>
    </form>
@endsection
