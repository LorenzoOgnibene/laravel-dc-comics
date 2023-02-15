@extends('layouts.app')

@section('content')

<div class="card text-center">
   <h1 class="card-title mb-3">{{$comic->title}}</h1>
   <img src="{{$comic->image}}" class="card-img-top w-50 m-auto" alt="...">
   <div class="card-body">
     <p class="card-text">{{$comic->description}}</p>
     <p class="card-text">Prezzo {{$comic->price}}&euro;</p>
     <a href="{{route('comics.edit', $comic->id)}}" class="btn btn-primary">Edit</a>
   </div>
 </div>

@endsection