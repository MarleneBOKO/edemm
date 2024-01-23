<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
class UtilisateursController extends Controller
{

    public function index()
    {
        $users = User::all(); // Récupérer tous les utilisateurs depuis le modèle User
        return view('dashboard.utilisateur', compact('users'));
    }
    public function edit($id)
{
    $user = User::find($id);

    return view('crud.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::find($id);

    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
        'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        'role' => ['required', 'in:admin,user'],
    ]);

    $user->update($validatedData);

    return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
}

public function delete($id)
{
    $user = User::find($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
}
}
