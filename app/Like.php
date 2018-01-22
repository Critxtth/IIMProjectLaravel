<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model

{


    protected $fillable = ['comment_id', 'user_id', 'vote'];

    protected $table = "vote";

    public $timestamps = false;

}