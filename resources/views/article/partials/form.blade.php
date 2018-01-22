<form action="{{$item->exists ? route('article.update', [$item->id]): route('article.store')}}" method="POST">
    {{ csrf_field() }}

    {{ method_field( $item->exists ? 'PUT' : 'POST') }}

    <div class="form-group">
        <input class="form-control" value="{{old('title', $item->title)}}" placeholder="Titre" type="text" name="title">
    </div>

    <div class="form-group">
        <textarea name="content"
                  id=""
                  cols="30"
                  rows="10"
                  class="form-control" placeholder="Contenu">{{old('content', $item->content)}}</textarea>
    </div>

    <div class="form-group">
        <input type="file" id="img" name="img" class="form-control" placeholder="Image">
    </div>

    <button class="btn btn-primary btn-block">Envoyer</button>
</form>