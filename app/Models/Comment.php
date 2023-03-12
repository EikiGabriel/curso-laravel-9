<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 'visible'
    ];

    protected $casts = [
        'visible' => 'boolean' // todo vez que canhamar a requisição o casts vai tranformar 'visible' em formato boolean no banco
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
