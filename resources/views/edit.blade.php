@extends('layouts.app')

@section('content')
<div class="text-center">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                        {{$myError=$error}}
                        
                        {{$isTrue=true}}
                        
                    </li>
                    @endforeach
                </ul>
            </div>
    @endif
    <form action="{{route('comics.update', $comic->id)}}" method="POST" class="w-50 m-auto"> @csrf @method('PUT')
        <label for="title" class="form-label text-white">Titolo</label>
        <input type="text" class="form-control" name="title" value="{{ $comic->title, old($comic->title)}}">
        
        <label for="description" class="form-label text-white">Descrizione</label>
        <textarea name="description" class="form-control" >{{ $comic->description, old($comic->description)}}</textarea>
        
        <label for="image" class="form-label text-white">Immagine</label>
        <input type="text" class="form-control" name="image" value="{{$comic->image, old($comic->image)}}">
        
        <label for="price" class="form-label text-white">Prezzo</label>
        <input type="text" class="form-control" name="price" value="{{ $comic->price, old($comic->price)}}">

        <label for="series" class="form-label text-white">Serie</label>
        <input type="text" class="form-control" name="series" value="{{ $comic->series, old($comic->series)}}">

        <label for="sale_date" class="form-label text-white">data di uscita</label>
        <input type="text" class="form-control" name="sale_date" value="{{ $comic->sale_date, old($comic->sale_date)}}">

        <label for="type" class="form-label text-white">Tipo</label>
        <input type="text" class="form-control mb-5" name="type" value="{{ $comic->type, old($comic->type)}}" >

        <button type="submit" class="btn btn-danger">Aggiungi</button>
    </form>
</div>
@endsection