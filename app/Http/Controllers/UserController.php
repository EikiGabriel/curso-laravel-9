<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $var ="eiki"; //definindo as variaveis
        return view('users.index', ['nome'=>$var]); //passando as variaveis como parametros para a view
    }
}
