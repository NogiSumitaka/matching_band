<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class MessageController extends Controller
{
    public function send(Request $request, Message $message)
    {
        $input_message = $request->message;
        
        $band->fill($input_band)->save();
    }
}
    
