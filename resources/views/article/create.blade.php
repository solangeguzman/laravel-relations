@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>AGGIUNGI UN TUO NUOVO ARTICOLO</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div> 


        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="author_id">Options</label>
                </div>
                <select class="custom-select" id="author_id" name="author_id">
                    <option selected>Choose...</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="tex">Text</label>
            <input type="text" class="form-control" name="text" id="text">
        </div> 


        <div class="form-group">
            <label for="cover">Picture</label>
            <input type="text" class="form-control" name="cover" id="cover">
        </div> 

   <button type="submit" class="btn btn-primary">Salva</button>
</form>



</div>
@endsection