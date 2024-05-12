@extends('base')

@section('content')
<div class="content-page" style="margin: 10px;">
    <h3>Auteur gegevens wijzigen</h3>
    <form action="/authors/{{ $author->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="naam">
                    <div class="form-group">
                        <label for="firstname">Voornaam</label>
                        <input name="firstname" class="form-control" type="text" value="{{$author->firstname}}">
                    </div>
                    <div class="form-group">
                        <label for="infix">Tussenvoegsel</label>
                        <input name="infix" class="form-control" type="text" value="{{$author->infix}}">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Achternaam</label>
                        <input name="lastname" class="form-control" type="text" value="{{$author->lastname}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="biography">Biografie</label>
                    <textarea name="biography" id="" class="form-control" cols="30" rows="10">{{ $author->biography }}</textarea>
                </div>
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select name="role_id" id="">
                        @foreach ($roles as $role)
                            <option class="form-control" value="{{$role->id}}" {{ $role->id == $author->role_id ? 'selected' : '' }}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Opslaan</button>
            </div>
        </div>
    </form>
</div>
@endsection
    