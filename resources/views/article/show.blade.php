@extends('layouts.app')

@section('content')

    <main role="main" class="container">

        <div class="row">

            <div class="col-sm-8 blog-main">

                <div class="blog-post" data-postid="{{ $article->id }}">
                    <h1 class="blog-post-title">{{ $article->title }}</h1>
                    <p class="blog-post-meta">{{ $article->created_at->format('d M Y') }} par {{ $article->user->name }} <a href="#"></a></p>
                    <p>{{ $article->content }}</p>
                    @if($article->img == 'default.jpg')
                    @else
                        <p><img src="upload/{{ $article->img }}" alt="" ></p>
                    @endif
                    <hr>

                     {{ $like->where('article_id', '=', $article->id)->where('like', '==', 1)->count() }} |
                    {{ $like->where('article_id', '=', $article->id)->where('like', '==', 0)->count() }}

                    <br>
                    <br>



                    <br><br>
                    <div>

                    </div>


                </div><!-- /.blog-post -->









        </div><!-- /.row -->

    </main><!-- /.container -->



@endsection