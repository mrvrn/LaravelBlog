@extends('base')

@section('content')
<div class="content-page" style="margin: 10px;">
    <h3>Nieuwe artikel aanmaken</h3>
    <form action="/articles" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="author_id">Auteur</label>
                    <select name="author_id" id="">
                        @foreach ($authors as $author)
                            <option class="form-control" value="{{$author->id}}">{{$author->firstname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_id">Categorie</label>
                    <select name="category_id" id="">
                        @foreach ($categories as $category)
                            <option class="form-control" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Titel</label>
                    <input name="title" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="description">Artikel</label>
                    <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Opslaan</button>
            </div>
        </div>
    </form>
</div>
@endsection
    