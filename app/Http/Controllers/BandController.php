<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Inst;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index(Band $band){
        return view('welcome')->with(['bands' => $band->getPaginateByLimit()]);
    }
    
    public function show(Band $band){
        return view('posts.show')->with(['band' => $band]);
    }
    
    public function create(Genre $genre, Prefecture $prefecture, Inst $inst){
        return view('posts.create_band')->with([
            'genres' => $genre->get(),
            'prefectures' => $prefecture->get(),
            'insts' => $inst->get(),
        ]);
    }
    
    public function store(Request $request, Band $band)
    {
        $input_band = $request['band'];
        $input_genre = $request->genres_array;
        
        $band->fill($input_band)->save();
        $band->genres()->attach($input_genre);
        return redirect('/');
    }
}
?>