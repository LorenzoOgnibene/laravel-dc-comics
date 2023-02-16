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
            'description' => 'required|min:10|max:200',
            'image' => 'url|max:400',
            'price' => 'required|numeric|min:1|max:7',
            'series' => 'required|min:10|max:50',
            'sale_date' => 'required|date|before:today',
            'type' => 'required|min:10|max:50'
            
        ]);
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
        'title' => 'required',
        'description' => 'required|min:10|max:200',
        'image' => 'url|max:400',
        'price' => 'required|numeric|min:1|max:7',
        'series' => 'required|min:10|max:50',
        'sale_date' => 'required|date|before:today',
        'type' => 'required|min:10|max:50'
        
    ]);
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
