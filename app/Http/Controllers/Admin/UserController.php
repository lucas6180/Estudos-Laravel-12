<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }
    public function edit(String $id)
    {
        // $user = User::where('id', '=', $id)->first();
        // $user = User::where('id', $id)->first()
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado!');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, String $id)
    {
        if(!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado!');
        }
        $data = $request->only('name', 'email');
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }    
        $user->update($data);

        return redirect()
        ->route('users.index')
        ->with('success', 'Usuário editado com sucesso!');

    }
    
    public function show(String $id)
    {
        if(!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado!');
        }
        return view('admin.users.show', compact('user'));
    }

    public function destroy(String $id){
        if(!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado!');
        }
        if(Auth::user()->id === $user->id) {
            return back()->with('message', 'Você não pode deletar o seu próprio usuário!');
        }
        $user->delete();

        return redirect()
        ->route('users.index')
        ->with('success', 'Usuário deletado com sucesso!');
    }
    public function createBook(){
        
    }
}
