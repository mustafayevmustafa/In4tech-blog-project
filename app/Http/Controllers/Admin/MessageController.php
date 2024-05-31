<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all();
        return view('Admin.pages.messages.index', compact('messages'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $data = Message::findOrFail($id);
        $data->deleted_at = now();
        $data->save();

        return redirect()->route('Admin.message.index');
    }

    public function removedMessages(){
        $messages = Message::onlyTrashed()->get();
        return view('Admin.pages.messages.removedMessages', compact('messages'));
    }
    public function permanentlyDelete($id){
        Message::where('id', $id)->forceDelete();

        return redirect()->route('Admin.message.removedMessages');
    }
}
