<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
      <!-- <a href="{{route('articles.create')}}">NUOVO Articolo</a>  -->
    <table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Imagen</th>
      <th scope="col">Testo</th>
      <th scope="col"><a href="{{ route('articles.create')}}"><button class="button-create" class="button-new-p" class="bi bi-calendar-plus">NewPost</button></th>

    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
     <tr>
      <th scope="row"><a href="{{route('articles.show', $article)}}"> {{$article->id}} </a></th> 
      <td> {{$article->title}} </td>
      <td> <img src="{{$article->cover}}" alt="cover" width="100"/> </td>
      <td> {{$article->text}} <br/></td>
    </tr>
</div>
    @endforeach
  </tbody>
</table>
    </div>
</div>
@endsection
</body>
</html>

