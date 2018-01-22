<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentVote;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Get Comments for pageId
     *
     * @return Comment
     */


    public function index($pageId)
    {

        $comments = Comment::where('page_id', $pageId)->get();

        $commentsData = [];

        foreach ($comments as $key) {

            $user = User::find($key->users_id);

            $name = $user->name;

            $replies = $this->replies($key->id);

            $photo = $user->first()->photo_url;

// dd($photo->photo_url);

            $reply = 0;

            $vote = 0;

            $voteStatus = 0;


            if (Auth::user()) {

                $voteByUser = CommentVote::where('comment_id', $key->id)->where('user_id', Auth::user()->id)->first();

                if ($voteByUser) {

                    $vote = 1;

                    $voteStatus = $voteByUser->vote;

                }


            }

            if (sizeof($replies) > 0) {

                $reply = 1;

            }

            array_push($commentsData, [

                "name" => $name,

                "photo_url" => (string)$photo,

                "commentid" => $key->id,

                "comment" => $key->comment,

                "votes" => $key->votes,

                "reply" => $reply,

                "votedByUser" => $vote,

                "vote" => $voteStatus,

                "replies" => $replies,

                "date" => $key->created_at->toDateTimeString()

            ]);


        }

        $collection = collect($commentsData);

        return $collection->sortBy('votes');

    }

    protected function replies($commentId)

    {
        $comments = Comment::where('reply_id', $commentId)->get();

        $replies = [];

        foreach ($comments as $key) {

            $user = User::find($key->users_id);

            $name = $user->name;

            $photo = $user->first()->photo_url;

            $vote = 0;

            $voteStatus = 0;


            if (Auth::user()) {

                $voteByUser = CommentVote::where('comment_id', $key->id)->where('user_id', Auth::user()->id)->first();


                if ($voteByUser) {

                    $vote = 1;

                    $voteStatus = $voteByUser->vote;

                }


            }


            array_push($replies, [

                "name" => $name,

                "photo_url" => $photo,

                "commentid" => $key->id,

                "comment" => $key->comment,

                "votes" => $key->votes,

                "votedByUser" => $vote,

                "vote" => $voteStatus,

                "date" => $key->created_at->toDateTimeString()

            ]);


            $collection = collect($replies);

            return $collection->sortBy('votes');

        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'comment' => 'required',

            'reply_id' => 'filled',

            'page_id' => 'filled',

            'users_id' => 'required',]);

        $comment = Comment::create($request->all());

        if ($comment)

            return ["status" => "true", "commentId" => $comment->id];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $commentId
     * @param  int $type
     * @return \Illuminate\Http\Response|string
     */
    public function update(Request $request, $commentId, $type)
    {


        if ($type == "vote") {

            $this->validate($request, [

                'vote' => 'required',

                'users_id' => 'required',

            ]);


            $comments = Comment::find($commentId);

            $data = [

                "comment_id" => $commentId,

                'vote' => $request->vote,

                'user_id' => $request->users_id,

            ];


            if ($request->vote == "up") {

                $comment = $comments->first();

                $vote = $comment->votes;

                $vote++;

                $comments->votes = $vote;

                $comments->save();

            }


            if ($request->vote == "down") {

                $comment = $comments->first();

                $vote = $comment->votes;

                $vote--;

                $comments->votes = $vote;

                $comments->save();

            }


            if (CommentVote::create($data))

                return "true";

        }


    }
}









