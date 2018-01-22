@extends('layouts.app')

@section('content')
    @if(!$articles->isEmpty())

        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">

                    @foreach($articles as $article)

                        <div class="blog-post">
                            <a href="{{ $article->id }}"><h1 class="blog-post-title">{{ $article->title }}</h1></a>

                            <p>{{ $article->body }}</p>
                            @if($article->url == 'default.jpg')
                            @else
                                <p><img src="upload/{{ $article->url }}" alt="" style="width: 600px; height: 400px"></p>
                            @endif
                            <hr>



                        </div><!-- /.blog-post -->
                    @endforeach


                </div><!-- /.blog-main -->

                <aside class="col-sm-3 ml-sm-auto blog-sidebar">

                    <div class="sidebar-module">
                        <h4>Anciens articles</h4>
                        @foreach($articles as $article)
                            <ol class="list-unstyled">
                                <li><a href="{{ $article->id }}">{{ $article->title }}</a></li>

                            </ol>

                        @endforeach

                    </div>


                </aside><!-- /.blog-sidebar -->

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
