@extends('layouts.app')

@section('content')
    @if(!$articles->isEmpty())

        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">

                    @foreach($articles as $article)

                        <div class="blog-article">
                            <a href="{{ $article->id }}"><h1 class="blog-article-title">{{ $article->title }}</h1></a>


                            <p>{{ $article->content }}</p>

                            @if($article->img == 'default.jpg')
                            @else
                                <p><img src="upload/{{ $article->img }}" alt=""></p>
                            @endif





                        </div><!-- /.blog-post -->
                    @endforeach


                </div><!-- /.blog-main -->


            </div><!-- /.row -->

        </div><!-- /.container -->

    @else


        <div class="container">
            <div class="row">
                <div class="col-lg-12 blog-main">

                    <h1 style="text-align: center;">Articles</h1>
                    <h3>Il n'y a pas d'articles ! </h3>

                </div>
            </div>
        </div>

    @endif


@endsection
