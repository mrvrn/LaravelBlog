@extends('base')

@section('content')    
    <div>
        <h2>Upload bestand</h2>
        <form action="/articles/{{ $article->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file[]" multiple>
            <button type="submit">Upload</button>
        </form>
    </div>
@endsection