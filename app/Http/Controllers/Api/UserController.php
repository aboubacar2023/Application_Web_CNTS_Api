<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $name = $request->input('name');
    $password = $request->input('password');

    // Recherchez un utilisateur avec le nom donné
    $user = User::where('name', $name)->first();
    if ($user &&  $user->password = $password) {
        // L'utilisateur est authentifié avec succès
        // Vous pouvez rediriger l'utilisateur vers la page d'accueil ou effectuer d'autres actions ici
        return redirect()->route('admin');
    } else {
        
    }
}


}

