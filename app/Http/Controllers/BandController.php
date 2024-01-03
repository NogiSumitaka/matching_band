<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index(Band $band){
        return view('welcome')->with(['bands' => $band->getPaginateByLimit()]);
    }
    
    public function show(Band $band){
        return view('posts.show')->with(['band' => $band]);
    }
}
?>