<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); // Paginação de 10 usuários por página
        return view('user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // Criar o usuário com a senha criptografada
        User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => Hash::make('123'),
        ]);

        return $this->redirectSuccess('Usuário cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->update($validatedData);

        return $this->redirectSuccess('Usuário atualizado com sucesso!');
    }

    public function list()
    {
        $users = User::paginate(10); // Melhor paginar os usuários para evitar sobrecarga
        return view('user.list', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return $this->redirectSuccess('Usuário excluído com sucesso!');
    }

    private function redirectSuccess($message)
    {
        return redirect()->route('user.index')->with('success', $message);
    }
}
