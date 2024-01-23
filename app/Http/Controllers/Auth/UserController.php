<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    $user = Auth::user();

    $id = Auth::id();

    User::create([
        'username' => $request->username,
        'email' => $request->email,
        'user_type' => $request->user_type,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Inscription réussie. Connectez-vous maintenant.');
}

    // Méthode pour afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validatedData)) {
            return redirect()->route('acceuil');
        } else {
            return redirect()->back()->withErrors(['email' => 'Identifiants invalides.'])->withInput();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
