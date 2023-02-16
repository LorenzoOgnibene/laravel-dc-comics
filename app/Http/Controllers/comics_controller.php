<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Dotenv\Validator;
use Illuminate\Http\Request;
use PhpParser\NodeVisitor\FindingVisitor;

class comics_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $comic)
    {
        //'title', 'description', 'image', 'price', 'series', 'sale_date', 'type'
        $data = $comic->all();
        $comic->validate([
            'title' => 'required',
            'description' => 'required|min:10|1000',
            'image' => 'url|max:400',
            'price' => 'required|numeric|min:1',
            'series' => 'required|min:10|max:50',
            'sale_date' => 'required|date|before:today',
            'type' => 'required|min:10|max:50'
            
        ],
        [
            'title.required'=> 'Inserisci un titolo valido',
            'description.required'=>'inserisci una descrizione valida',
            'description.min'=>'inscerisci almeno 10 caratteri nella descrizione',
            'description.max'=>'non puoi inserire piu\' di 1000 caratteri nella descrizione',
            'image.url'=>'inscerisci un url valido',
            'price.required'=>'inscerisci un prezzo valido',
            'price.numeric'=>'il prezzo deve essere un numero',
            'price.min'=>'inscerisci almeno 1 numero',
            //'price.max'=>'non puoi inserire piu\' di 7 numeri nel prezzo',
            'series.required'=>'inserisci una serie valida',
            'series.min'=>'inserisci almeno 10 caratteri',
            'series.max'=>'non puoi inserire piu\' di 50 caratteri',
            'sale_date.required'=>'inserisci una data valida',
            'sale_date.date'=>'inserisci una data valida formato Y-M-D',
            'sale_date.today'=>'a meno che tu non venga dal futuro non puoi inserire una data dopo quella odierna',
            'type.required'=>'inserisci un tipo valido',
            'type.min'=>'inserisci almeno 10 caratteri',
            'type.max'=>'non puoi inserire piu\' di 50 caratteri',
    
            ]
    );
        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
       $data = $request->all();
       $comic= Comic::findOrFail($id);
       $request->validate([
        'title' => 'required|min:4',
        'description' => 'required|min:10|max:1000',
        'image' => 'url|max:400',
        'price' => 'required|numeric|min:1',
        'series' => 'required|min:10|max:50',
        'sale_date' => 'required|date|before:today',
        'type' => 'required|min:10|max:50'
        
       ],
       [
        'title.required'=> 'Inserisci un titolo valido',
        'description.required'=>'inserisci una descrizione valida',
        'description.min'=>'inscerisci almeno 10 caratteri nella descrizione',
        'description.max'=>'non puoi inserire piu\' di 1000 caratteri nella descrizione',
        'image.url'=>'inscerisci un url valido',
        'price.required'=>'inscerisci un prezzo valido',
        'price.min'=>'inscerisci almeno 1 numero',
        //'price.max'=>'non puoi inserire piu\' di 7 numeri nel prezzo',
        'series.required'=>'inserisci una serie valida',
        'series.min'=>'inserisci almeno 10 caratteri',
        'series.max'=>'non puoi inserire piu\' di 50 caratteri',
        'sale_date.required'=>'inserisci una data valida',
        'sale_date.date'=>'inserisci una data valida formato Y-M-D',
        'sale_date.today'=>'a meno che tu non venga dal futuro non puoi inserire una data dopo quella odierna',
        'type.required'=>'inserisci un tipo valido',
        'type.min'=>'inserisci almeno 10 caratteri',
        'type.max'=>'non puoi inserire piu\' di 50 caratteri',

        ]

);
       $comic->update($data);
       return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index', $comic->id);
    }
}
