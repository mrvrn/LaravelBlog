@extends('base')

@section('content')
<div class="content-page" style="margin: 10px;">
    <h3>Nieuwe categorie aanmaken</h3>
    <form action="/categories" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input name="name" class="form-control" type="text">
                </div>
                <button class="btn btn-primary mt-2" type="submit">Opslaan</button>
            </div>
        </div>
    </form>
</div>
@endsection
    