<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = User::get();
        return response()->json($data, 201);
    }

    public function edit($id){
        $data = User::findOrFail($id);
        return response()->json($data, 200);
    }

    public function store(Request $request){
        $data = $request->all();
        User::create($data);
        return response()->json('Data gonderildi', 201);
    }

    public function delete($id){
        User::find($id)->delete();
        return response()->json('Data silindi', 200);
    }

    public function update(Request $request,$id){
        $data = $request->all();
        $model = User::findOrFail($id);
        $model->update($data);
        return response()->json('Data guncellendi', 200);
    }
}
