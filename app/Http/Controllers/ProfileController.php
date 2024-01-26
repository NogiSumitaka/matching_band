<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Inst;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     
    public function show(User $user, Genre $genre, Prefecture $prefecture, Inst $inst){
        return view('profile.show_profile')->with([
            'user' => $user,
            'genre' => $genre,
            'prefecture' => $prefecture,
            'inst' => $inst,
            ]);
    }
    */
    
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

    /**
     * Update the user's profile information.
     */
    /**public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    **/

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    /* show_users_application_infomation*/
    public function show_apply(Request $request)
    {
        $userId = $request->user()->id;
        $bands = User::find($userId)->applications;
        $mybands = User::find($userId)->bands;
        
        return view('apps.apply')->with([
            'user' => $request->user(),
            'bands' => $bands,
            'mybands' => $mybands,
            ]);
    }
    
    public function user_chatroom(User $user)
    {
        return view('apps.chatroom');
    }
}
