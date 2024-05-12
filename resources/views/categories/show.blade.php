@extends('base')

@section('content')
    <h3>{{ $category->name }}</h3>
    <ul>
        @foreach($articles as $article)
            <li><a href="/articles/{{$article->id}}">{{ $article->title }} - {{$author->firstname}} {{$author->infix}} {{$author->lastname}}</a></li>
        @endforeach
    </ul>
    <form action="/categories/{{$category->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Verwijder categorie</button>
    </form>
    <a href="/categories/{{$category->id}}/edit" class="btn btn-primary">Bewerken</a>
    <!-- Bestand uploaden button -->
    <a href="/categories/{{$category->id}}/file" class="btn btn-primary">Bestand uploaden</a>
@endsection