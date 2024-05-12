@extends('base')

@section('content')

    <h3>Bewerk categorie</h3>
    <form action="/categories/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Naam categorie</label>
                    <input name="name" type="text" value="{{ $category->name }}">
                </div>
                <button class="btn btn-primary" type="submit">Opslaan</button>
            </div>
        </div>
    </form>

@endsection