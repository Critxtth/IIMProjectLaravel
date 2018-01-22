<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentVote extends Model

{



    protected $fillable = ['comment_id','user_id','vote'];

    protected $table = "vote";

    public $timestamps = false;

class Like extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function article(){
        return $this->belongsTo('App\Article');
    }
}