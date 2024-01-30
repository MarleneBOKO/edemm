<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ProfilController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required|in:Admin,Simple',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'user_type' => $validatedData['user_type'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }
}
