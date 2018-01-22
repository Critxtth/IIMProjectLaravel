<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'isdone',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function likes(){
        return $this->belongsTo('App\Like');
    }
    public function like(){
        return $this->hasMany(Like::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }
    public function addComment($content, $user_id){
        $this->comments()->create(compact('content','user_id'));
    }

}
