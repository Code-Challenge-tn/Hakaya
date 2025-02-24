<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Récupérer les informations du formulaire
        $email = $request->input('email');
        $password = $request->input('password');

        // Vérifier si l'email et le mot de passe sont "rim"
        if ($email === 'Hakayaprincipaladmin' && $password === 'Editing@Hakaya@site2025') {
            // Stocker l'information de connexion dans la session
            Session::put('user_logged_in', true);
            return redirect('/da'); // Redirection vers le dashboard
        } else {
            return back()->withErrors(['message' => 'Email ou mot de passe invalide']);
        }
    }

    public function logout()
    {
        // Détruire la session et rediriger vers la page de connexion
        Session::forget('user_logged_in');
        return redirect('/login')->with('success', 'Déconnexion réussie.');
    }
}
