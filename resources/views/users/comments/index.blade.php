@extends('layouts.app')

@section('title', "Comentários do Usuário {$user->name}")

@section('content')
    <BUtton><a href="http://localhost:8989/users">HOME</a></BUtton>
    <h1>
        Comentários do Usuário {{$user->name}}
        <a href= "{{ route('comments.create', $user->id) }}">
        +
        </a>
    </h1>

    <hr>
    <form action="{{ route('comments.index', $user->id) }}" method="get">
        <input type="text" name="search" id="" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Comentário</th>
                <th>Visível</th>
                <th>Edit</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->visible ? 'Sim' : 'Não' }}</td>
                <td><a href="{{route('comments.edit', ['user_id'=>$user->id, 'id'=>$comment->id])}}">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
