@extends('layouts.app')

@section('content')
<div class="text-center">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
      
    <form action="{{route('comics.store')}}" method="POST"> @csrf
        <label for="title" class="form-label text-white">Titolo</label>
        <input type="text" class="form-control" name="title" value="{{old('title')}}">
        
        <label for="description" class="form-label text-white">Descrizione</label>
        <textarea name="description" class="form-control">{{old('description')}}</textarea>
        
        <label for="image" class="form-label text-white">Immagine</label>
        <input type="text" class="form-control" name="image" value="{{old('image')}}">
        
        <label for="price" class="form-label text-white">Prezzo</label>
        <input type="text" class="form-control" name="price" value="{{old('price')}}">

        <label for="series" class="form-label text-white">Serie</label>
        <input type="text" class="form-control" name="series" value="{{old('series')}}">

        <label for="sale_date" class="form-label text-white">data di uscita</label>
        <input type="text" class="form-control" name="sale_date" value="{{old('sales_date')}}">

        <label for="type" class="form-label text-white">Tipo</label>
        <input type="text" class="form-control mb-5" name="type" value="{{old('type')}}">

        <button type="submit" class="btn btn-danger">Aggiungi</button>
    </form>
</div>
@endsection