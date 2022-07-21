@extends('layouts.app')

@section('title', "Editar Comentário do Usuário {$user->name}")

@section('content')
    <button><a href="http://localhost:8989/users/{{$user->id}}/comments/">VOLTAR</a></button>
    <h1>Editar Comentário do Usuário {{$user->name}}</h1>

    {{-- error msg --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('comments.update', $comment->id)}}" method="POST">
        {{-- método para permitir a edição --}}
        @method('PUT')

        {{-- método para aumentar a segurnaça dos dados nas requisições --}}
        @csrf

        {{-- value = persistir os dados --}}
        <textarea name="body" id="" cols="30" rows="10">{{ $comment->body ?? old('body')}}</textarea>
        <label for="visible"><input type="checkbox" name="visible" id=""
            @if (isset($comment) && $comment->visible)
                @checked(true)
            @endif
            > Vísible?</label>
        <input type="submit" value="Enviar">
    </form>
@endsection
