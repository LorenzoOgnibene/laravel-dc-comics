@extends('layouts.app')

@section('content')
<div class="text-center">
    <form action="{{route('comics.store')}}" method="POST"> @csrf
        <label for="title" class="form-label text-white">Titolo</label>
        <input type="text" class="form-control" name="title">
        
        <label for="description" class="form-label text-white">Descrizione</label>
        <textarea name="description" class="form-control"></textarea>
        
        <label for="image" class="form-label text-white">Immagine</label>
        <input type="text" class="form-control" name="image">
        
        <label for="price" class="form-label text-white">Prezzo</label>
        <input type="text" class="form-control" name="price">

        <label for="series" class="form-label text-white">Serie</label>
        <input type="text" class="form-control" name="series">

        <label for="sale_date" class="form-label text-white">data di uscita</label>
        <input type="text" class="form-control" name="sale_date">

        <label for="type" class="form-label text-white">Tipo</label>
        <input type="text" class="form-control mb-5" name="type">

        <button type="submit" class="btn btn-danger">Aggiungi</button>
    </form>
</div>
@endsection