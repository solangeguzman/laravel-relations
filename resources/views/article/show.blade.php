@extends('layouts.app')
<div class="button-create">
<br>
<div>
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Imagen</th>
      <th scope="col">Data</th>
      <th scope="col">Tag</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="row"></th>
      <td> {{$article->title}} </td>
      <td> <img src="{{$article->cover}}" alt="picpost" width="50"/> </td>
      <td> {{$article->text}}</td>
      <td> 
        @foreach($article->tag as $tag)
            <div>
                {{$tag->surname}}       
            </div>
       @endforeach
     </td>
    </tr> 
</div>
  </tbody>
</table>