<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Band;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Inst;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function welcome(Request $request, Band $band){
        return view('welcome')->with([
            'bands' => $band->getPaginateByLimit(),
            'user' => $request->user(),
            ]);
    }
    
    public function index(Request $request, Band $band){
        return view('index')->with([
            'bands' => $band->getPaginateByLimit(),
            'user' => $request->user(),
            ]);
    }
    
    public function show(Band $band){
        return view('posts.show')->with(['band' => $band]);
    }
    
    public function create(Request $request, Genre $genre, Prefecture $prefecture, Inst $inst){
        return view('posts.create_band')->with([
            'user' => $request->user(),
            'genres' => $genre->get(),
            'prefectures' => $prefecture->get(),
            'insts' => $inst->get(),
        ]);
    }
    
    public function store(Request $request, Band $band)
    {
        $input_band = $request['band'];
        $input_genre = $request->genres_array;
        $input_prefecture = $request->prefecture;
        $input_inst = $request->insts_array;
        
        $band->fill($input_band)->save();
        $band->genres()->attach($input_genre);
        $band->prefectures()->attach($input_prefecture);
        $band->insts()->attach($input_inst);
        return redirect('/');
    }
}
?>