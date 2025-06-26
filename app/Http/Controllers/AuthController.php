<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Construtor com middlewares para proteger rotas de login, registro e logout
    public function __construct()
    {
        $this->middleware('guest')->only(['showLogin', 'login', 'showRegister', 'register']);
        $this->middleware('auth')->only(['logout']);
    }

    /**
     * Exibe o formulário de login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Processa o login do usuário
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redireciona baseado no tipo de usuário
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin/products');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->onlyInput('email');
    }

    /**
     * Exibe o formulário de registro
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Processa o registro do usuário
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Adicione 'is_admin' => false se quiser garantir que não seja admin
        ]);

        Auth::login($user);

        return redirect('/');
    }

    /**
     * Faz logout do usuário
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
