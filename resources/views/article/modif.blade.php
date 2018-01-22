@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 panel panel-default">
                <a href="{{ ('/create') }}" style="color: black; font-size: 15px;">Ajouter un article</a>
                <div class="panel-heading" style="font-size: 30px;">Mes articles</div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID de l'article</th>
                        <th>Titre de l'article</th>
                        <th>Contenu de l'article</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <th scope="row">{{$article->id}}</th>
                            <td>{{$article->title}}</td>
                            <td>{{$article->content}}</td>
                            <td>

                                <a href="{{ $article->id }}" class="btn btn-success btn-sm">
                                    Show
                                </a>
                                <span>|</span>


                                <a href="{{ route('edit', [$article->id]) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <span>|</span>
                                <a href="" class="btn btn-danger btn-sm"
                                   onclick="event.preventDefault();document.getElementById('form-{!! $article->id !!}').submit();">
                                     Delete
                                </a>



                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
