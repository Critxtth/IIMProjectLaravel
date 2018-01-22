@extends('layouts.app')

@section('content')

    <main role="main" class="container">

        <div class="row">

            <div class="col-sm-8 blog-main">

                <div class="blog-post" data-postid="{{ $article->id }}">
                    <h1 class="blog-post-title">{{ $article->title }}</h1>

                    <p>{{ $article->content }}</p>

                    <br><br>
                    <div>
                        <h2>Commentaires: </h2>
                        <ul class="list-group">

                        </ul>
                    </div>


                </div><!-- /.blog-post -->









        </div><!-- /.row -->

    </main><!-- /.container -->



@endsection