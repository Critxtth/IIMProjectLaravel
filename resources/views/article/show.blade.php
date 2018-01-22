@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">

            <div class="container bg-light article">
                <h1 class="text-center">{{ $article->title }}</h1>
                <div class="text-center">{{ $article->content }}</div>
                <div class="container">
                    <ul class="list-unstyled">
                        <li><em>écrit le : {{ $article->created_at }}</em></li>
                        <li><em>par : {{ $article->who($article->user_id) }}</em></li>
                        <li><em>Modifié le : {{ $article->updated_at }}</em></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection