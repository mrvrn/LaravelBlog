@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <h3>{{ $article->title }}</h3>
            <img src="{{ asset('uploads/' . $article->image) }}" alt="">
            <p>{{ $author->firstname }} {{ $author->infix }} {{ $author->lastname }}</p>
            <p class="article-desc">{{ $article->description }}</p> 
        </div>
        <div class="row">
            <div class="col-md-3">
                <form action="/articles/{{$article->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                </form>
            </div>
            <div class="col-md-3">
                <a href="/articles/{{$article->id}}/edit" class="btn btn-primary">Bewerken</a>
            </div>
            <div class="col-md-3">
                <!-- Bestand uploaden button -->
                <a href="/articles/{{$article->id}}/file" class="btn btn-primary">Bestand uploaden</a>
            </div>
        </div>
    </div>
@endsection