<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::get();
        return view('admin.pages.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.settings.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingStoreRequest $request)
    {
        $token = $request->session()->token();

        if (Cache::has("csrf_{$token}")) {
            return redirect()->route('admin.settings.index')->with('error', 'Please wait before submitting again.');
        }
        Cache::set("csrf_{$token}", true, 10);
        $data = $request->validated();
        Setting::create($data);
        return redirect()->route('admin.settings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::find($id);
        return view('admin.pages.settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingUpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $setting = Setting::findOrFail($id);


        $setting->update($validatedData);
        return redirect()->route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Setting::findOrFail($id)->delete();
       return redirect()->route('admin.settings.index');
    }
}
