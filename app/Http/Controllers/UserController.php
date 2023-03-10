<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        
        $users = User::where('name', 'LIKE', "%{$request->search}%")->get();


        return view('users.index', compact('users'));
       // $var ="eiki"; //definindo as variaveis
       // return view('users.index', ['nome'=>$var]); //passando as variaveis como parametros para a view
    }

    public function show($id){
        //$user = User::where('id', $id)->first();
        if(!$user = User::find($id)){ //recupera um item pelo ID;
            return redirect()->back(); // ou redirect()->route('users.index')
        }
        return view('users.show', compact('user'));
        dd($user);


        return view('users.show', $id);
    }

    public function create(){
        
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request){
        //dd($request->all());
        /*
        dd($request->only([
            'name', 'email', 'password'
        ]));
        */
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($request->all());

        return redirect()->route('users.index');
    }

    public function edit($id){
        if(!$user = User::find($id))
            return redirect()->back();
        
        return view('users.edit',compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        
        $data = $request->only('name', 'email');

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        return redirect()->route('users.index');
    }

    public function delete($id){
 
        if(!$user = User::find($id)){ 
            return redirect()->route('users.index'); 
        }
        $user->delete();
        return redirect()->route('users.index'); 


  
    }


}
