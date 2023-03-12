<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCommentRequest;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user){
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index(Request $request, $userId){
        if(!$user = $this->user->find($userId)){ //procunrando o id do usuario
            return redirect()->back();
        }  //procunrando o id do usuario

        //$user->comment; //ja recebe todos os comentario
        $comments = $user->comments()->where('body', 'LIKE', "%{$request->search}%")->get(); //metodo get para poder buscar por parametros

        return view('users.comments.index', compact('user', 'comments'));
        
    }

    public function create($userId){
        if(!$user = $this->user->find($userId)){ //procunrando o id do usuario
            return redirect()->back();
        }  //procunrando o id do usuario

        return view('users.comments.create', compact('user'));
    }

    public function store(StoreUpdateCommentRequest $request, $userId){
        if(!$user = $this->user->find($userId)){ //procunrando o id do usuario
            return redirect()->back();
        }  //procunrando o id do usuario
        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }

    public function edit($userId, $id){
        if(!$comment = $this->comment->find($id)){ //procunrando o id do usuario
            return redirect()->back();
        }  //procunrando o id do usuario

        $user = $comment->user;
            
        return view('users.comments.edit', compact('user', 'comment'));
    }


    public function update(StoreUpdateCommentRequest $request, $id){
        if(!$comment = $this->comment   ->find($id)){ //procunrando o id do usuario
            return redirect()->back();
        }  //procunrando o id do usuario

        $comment->update([
            'body' => $request->body, 
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $comment->user_id);
    }

}