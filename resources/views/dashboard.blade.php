@extends('base')

@section('content')
<div class="row mt-4">
    <div class="categories col-md-12">
        <div class="container">
            <h3>Categorieën</h3>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="category" href="/categories/{{$category->id}}">
                            <a href="/categories/{{$category->id}}" class="cat-link">
                                <img src="{{ asset('uploads/' . $category->image) }}" alt="" class="category-image">
                                <div class="category-text">
                                    <p class="t-cat">{{ $category->name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="slider-container mt-5">
            <h3>Artikelen</h3>
            <button class="slider-button prev">&#8249;</button>
            <div class="slider articles">
                @foreach($articles as $article)
                    <div class="slide article" style="background-image: url('{{ asset('uploads/' . $article->image) }}');"><a href="/articles/{{$article->id}}"><h4 class="slide-title">{{ $article->title }}</h4></a></div>
                @endforeach
            </div>
            <button class="slider-button next">&#8250;</button>
        </div>
    </div>


    <div class="authors author-dash col-md-12">
        <div class="container">
            <h3>Onze auteurs:</h3>
            <div class="authors-dash">
                @foreach($authors as $author)
                    <div class="author d-auth">
                        <a href="/authors/{{$author->id}}">
                            <img src="{{ asset('uploads/' . $author->image) }}" alt="" class="author-image">
                            <p>{{ $author->firstname }} {{ $author->infix }} {{ $author->lastname }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    
    <div class="row mt-5">
        <div class="container">
            <div class="col-md-8">
                <div class="recent-articles">
                    <h3>Artikelen van vandaag: <span><small style="color: #3b9dc4">{{ date('d-m-Y') }}</small></span></h3>
                    <!-- Get all articles written today -->
                    <div class="col-md-7 card-box">
                        @foreach($recent_articles as $recent_article)
                            <div class="article-time">
                                <small class="article-time">{{ date('H:i', strtotime($recent_article->created_at)) }}</small>
                            </div>
                            <div class="recent d-flex align-items-center">
                                @if($recent_article->image != null)
                                    <img src="{{ asset('uploads/' . $recent_article->image) }}" alt="" class="article-image">
                                @endif
                                <a href="/articles/{{$recent_article->id}}">{{ $recent_article->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
