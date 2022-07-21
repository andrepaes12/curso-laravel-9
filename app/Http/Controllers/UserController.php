<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // injetar Request $request p/ realizar a pesquisa
    public function index(Request $request)
    {
        // $users = User::all(); //mesma função do get()
        // $users = User::get();
        // pesquisar
        // $users = User::where('name', 'LIKE', "%{$request->search}%")->get();

        // outro opção para pesquisar
        $search = $request->search;
        $users = User::where(function($query) use ($search){
            if ($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->paginate(2);

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        //opção de debug
        // dd('users.show', $id);
        // $user = User::where('id', $id)->first();
        // dd($user);

        //redirecionar se ID não encontrado
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    // php artisan make:request StoreUserUpdateRequest
    public function store(StoreUserUpdateRequest $request)
    {
        //coletar os dados do form (requisição)
        $data = $request->all();
        // criptografar o dados do campo password
        $data['password'] = bcrypt($request->password);

        // check image
        if ($request->image) {
            $data['image'] = $request->image->store('users');
            // $ext = $request->image->getClientOriginalExtension();
            // $data['image'] = $request->image->storeAs('users', now().".{$ext}");
        }

        // criar o Usuário pelo modelo
        $user = User::create($data);

        // mostrar o ID do usuário cadastrado
        // return redirect()->route('users.show', $user->id);
        // mostrar a listagem geral
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        // return view('users.edit', compact('user'));

        $data = $request->only('name', 'email');
        if ($request->password)
            $data['password']=bcrypt($request->password);

        if ($request->image){
            if ($user->image && Storage::exists($user->image)){
                Storage::delete($user->image);
            }
            $data['image'] = $request->image->store('users');
        }

        $user->update($data);
        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        $user->delete();

        return redirect()->route('users.index');
    }
}
