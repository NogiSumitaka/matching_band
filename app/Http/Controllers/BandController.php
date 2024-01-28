<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Band;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Inst;
use Illuminate\Http\Request;
use App\Http\Controllers\getSearchingBands;

class BandController extends Controller
{
    /* Guest view */
    public function welcome(Band $band, Genre $genre, Prefecture $prefecture, Inst $inst)
    {
        return view('welcome')->with([
            'bands' => $band->getPaginateByLimit(),
            'genres' => $genre->get(),
            'prefectures' => $prefecture->get(),
            'insts' => $inst->get(),
            ]);
    }
    
    /* Show index */
    public function index(Band $band, Genre $genre, Prefecture $prefecture, Inst $inst)
    {
        return view('index')->with([
            'bands' => $band->getPaginateByLimit(),
            'genres' => $genre->get(),
            'prefectures' => $prefecture->get(),
            'insts' => $inst->get(),
            ]);
    }
    
    /* Refine search */
    public function search(Request $request, Band $band, Genre $genre, Prefecture $prefecture, Inst $inst)
    {
        $bands = $band->getSearchingBands($request->inst, $request->genre, $request->prefecture);
        return view('index')->with([
            'bands' => $bands,
            'genres' => $genre->get(),
            'prefectures' => $prefecture->get(),
            'insts' => $inst->get(),
            ]);
    }
    
    /* バンドの詳細情報表示 */
    public function show(Band $band){
        return view('posts.show')->with(['band' => $band]);
    }
    
    /* 応募状況保存*/
    public function apply(Request $request){
        $userId = $request->user()->id;
        $bandId = $request->band_id;
        $user = User::find($userId);
        $user->applications()->attach($bandId);
        return redirect()->route('user_chatroom', ['user' => $userId, 'band' => $bandId]);
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