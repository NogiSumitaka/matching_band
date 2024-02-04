<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Band;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Inst;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, Genre $genre, Prefecture $prefecture, Inst $inst): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'genres' => $genre->get(),
            'prefectures' => $prefecture->get(),
            'insts' => $inst->get(),
        ]);
    }
    
    /**
     * Update the user's profile.
     */
    public function update(Request $request, User $user)
    {
        $input_user = $request['user'];
        $input_genre = $request->genres_array;
        $input_prefecture = $request->prefecture;
        $input_inst = $request->insts_array;
        
        $user->fill($input_user)->save();
        $user->genres()->sync($input_genre);
        $user->prefectures()->sync($input_prefecture);
        $user->insts()->sync($input_inst);
        return redirect('/profile');
    }
    
    /* Show own band infomation edit form*/
    public function editBand (Request $request)
    {
        $user_id = $request->user()->id;
        $bands = User::find($user_id)->bands()->with(['genres','insts','prefectures'])->get();
        return view('posts.update')->with([
            'user' => $request->user(),
            'bands' => $bands,
            ]);
    }
    
    /* Update own band infomation */
    public function updateBand(Request $request, Band $band)
    {
        $input_band = $request['band'];
        $band->fill($input_band)->save();
        $band->genres()->sync($request->genres_array);
        $band->prefectures()->sync($request->prefecture);
        $band->insts()->sync($request->insts_array);
        return redirect('/profile/bands');
    }

    /* Show user's application infomation */
    public function showApply(Request $request)
    {
        $user_id = $request->user()->id;
        $bands = User::find($user_id)->applications;
        $mybands = User::find($user_id)->bands;
        
        return view('apps.apply')->with([
            'user' => $request->user(),
            'bands' => $bands,
            'mybands' => $mybands,
            ]);
    }
    
    /* 応募したバンドとのチャット画面を表示*/
    public function userChatroom(User $user, $band)
    {
        $messages = $user->messages()->where('band_id' , $band)->get();
        return view('apps.chatroom')->with([
            'user' => $user,
            'messages' => $messages,
            'band_id' => $band,
            ]);
    }
    
    /* 応募者とのチャット画面を表示*/
    public function bandChatroom(Band $myband, $applicant)
    {
        $messages = $myband->messages()->where('user_id' , $applicant)->get();
        return view('apps.chatroom')->with([
            'band' => $myband,
            'messages' => $messages,
            'applicant_id' => $applicant,
            ]);
    }
    
    /* Store message */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $band_id = $request->band_id;
        if ($request->user_to_band == true){
            $user = User::find($user_id);
            $user->messages()->attach($band_id, ['user_to_band' => $request->user_to_band, 'message' => $request->message]);
            return redirect()->route('user_chatroom', ['user' => $user_id, 'band' => $band_id]);
        } else {
            $band = Band::find($band_id);
            $band->messages()->attach($user_id, ['user_to_band' => $request->user_to_band, 'message' => $request->message]);
            return redirect()->route('band_chatroom', ['myband' => $band_id, 'applicant' => $user_id]);
        }
    }
}
