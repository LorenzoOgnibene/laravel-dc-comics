@extends('layouts.app')
@section('content')
<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">titolo</th>
        <th scope="col">descrizione</th>
        <th scope="col">prezzo</th>
        <th scope="col">serie</th>
        <th scope="col">data ucita</th>
        <th scope="col">azioni admin</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($comics as $comic)
      <tr>
        <th scope="row">{{$comic->id}}</th>
        <td>{{$comic->title}}</td>
        <td>{{$comic->description}}</td>
        <td>{{$comic->price}}</td>
        <td>{{$comic->series}}</td>
        <td>{{$comic->sale_date}}</td>
        <td><a href="{{route('comics.show', $comic->id)}}" class="btn btn-info">Show</a></td>
        <td><a href="{{route('comics.edit', $comic->id)}}" class="btn btn-success">Edit</a></td>
        <td>
          <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </td> 
      </tr>   
      @endforeach
    </tbody>
  </table>
@endsection