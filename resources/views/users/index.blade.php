@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
    <h1>
        Lista dos Usuários
        <a href= "{{ route('users.create') }}">
        +
        </a>
    </h1>

    <hr>
    <form action="{{ route('users.index') }}" method="get">
        <input type="text" name="search" id="" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Edit</th>
                <th>Detail</th>
                <th>Comentários</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    @if ($user->image)
                        <img style="width: 1cm" src="{{url("storage/{$user->image}")}}" alt="{{$user->name}}">
                    @else
                        {{-- img salva no \\public --}}
                        <img style="width: 1cm" src="{{url('std.jpg')}}" alt="{{$user->name}}">
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{route('users.edit', $user->id)}}">Editar</a></td>
                <td><a href="{{route('users.show', $user->id)}}">Detalhes</a></td>
                {{-- contar a qtde de comentários por usuário, mas não adequado, pois sobrecarrega o banco de dados consultando a cada usuário --}}
                {{-- <th>Comentários [{{$user->comments->count()}}]</th> --}}
                {{-- correto é incluir a consulta no Model User.php no método getUsers() --}}
                <td><a href="{{route('comments.index', $user->id)}}">Comentários [{{$user->comments->count()}}]</a></td>
            </tr>
        @endforeach
        </tbody>
    </table><br><hr>
    {{-- paginação gera conflito com o filtro --}}
    {{-- {{$users->links()}} --}}
    {{-- paginação sem conflito com o filtro --}}
    <div>
        {{$users->appends([
            'search' => request()->get('search', '')
        ])->links()}}
    </div>
@endsection
