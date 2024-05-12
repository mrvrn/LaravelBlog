@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 author-detail card-box">
                <h4>Auteur</h4>
                <img src="{{ asset('uploads/' . $author->image) }}" alt="" class="author-image">
                <p class="author-name">{{ $author->firstname }} {{ $author->infix }} {{ $author->lastname }}</p>
                <div class="author-bio"> 
                    <p>{{ $author->biography }}</p>
                </div>
                <!-- <p>{{ $role->name }}</p> -->
            </div>
            
            <div class="col-md-9">
                <h4>Artikelen</h4>
                @foreach($articles as $article)
                <a href="/articles/{{$article->id}}">{{ $article->title }}</a><br>
                @endforeach
            </div>
        </div>
        @if(Session::get('role_id') == 1)
            <div class="row">
                <!-- Delete button -->
                <div class="col-md-3">
                    <form action="/authors/{{$author->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Verwijder auteur</button>
                    </form>
                    <a href="/authors/{{$author->id}}/edit" class="btn btn-primary">Bewerken</a>
                </div>
            </div>
        @endif
        <!-- Bestand uploaden button -->
        <a href="/authors/{{$author->id}}/file" class="btn btn-primary">Bestand uploaden</a>
    </div>
    
@endsection