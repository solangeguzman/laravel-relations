@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <a href="{{route('articles.create')}}">NUOVO Articolo</a> 
    <table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Imagen</th>
      <th scope="col">Testo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
     <tr>
      <th scope="row"><a href="{{route('articles.show', $article)}}"> {{$article->id}} </a></th> 
      <td> {{$article->title}} </td>
      <td> <img src="{{$article->cover}}" alt="" width="50"/> </td>
      <td> {{$article->text}} <br/></td>
    </tr>
</div>
    @endforeach
  </tbody>
</table>
    </div>
</div>
@endsection
