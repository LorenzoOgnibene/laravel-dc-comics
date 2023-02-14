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
      </tr>
    </thead>
    <tbody>
    @foreach ($comics as $comic)
    <tr>
      <th scope="row">{{$comic['id']}}</th>
      <td>{{$comic['title']}}</td>
      <td>{{$comic['description']}}</td>
      <td>{{$comic['price']}}</td>
      <td>{{$comic['series']}}</td>
      <td>{{$comic['sale_date']}}</td>
    </tr>   
    @endforeach
    </tbody>
  </table>
@endsection