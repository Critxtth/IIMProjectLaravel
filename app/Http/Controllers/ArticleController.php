<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit','store','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('article.index', compact('articles'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required',
            'content'  => 'required',
            'img'   =>  'sometimes|image|mimes:jpg,jpeg,gif,png|max:2028',
        ]);

        $article = new Article;
        $article->title = request('title');
        $article->content = request('content');
        $article->user_id = auth()->id();
        if(!$request->hasFile('img')){
            $article->save();
        }else{
            $img_name = time(). '.' . $request->img->getClientOriginalExtension();
            $article->img  =  $img_name;
            $article->save();
            $request->img->move(public_path('upload'),$img_name);
        }
        return redirect('/');
    }
    /**
     * @param Request $request
     * @return null
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $like = like::get();
        return view('article.show', compact('article', 'like'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {

        $article->update($request->except('_token', '_method'));
        return redirect()->route('article.show', [$article->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back();
    }

    public function articles(){
        $articles = Article::latest()->get();
        return view('article.modif', compact('articles'));
    }
}
