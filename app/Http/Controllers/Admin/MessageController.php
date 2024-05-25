<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::get();

        return view('admin.pages.messages.index', compact('messages'));
    }

    public function delete(Request $request){
        $id = $request->id;
        Message::find($id)->delete();

        return redirect()->route('admin.message.index');
    }
}
