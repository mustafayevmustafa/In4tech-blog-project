<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Excel\SlidersExport;
use App\Imports\Excel\SlidersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderStoreRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        $categories = Category::all();
        return view('Admin.pages.sliders.index', compact('sliders', 'categories'));
    }

    public function create(){
        $categories = Category::get();
        return view('Admin.pages.sliders.create', compact('categories'));
    }

    public function store(SliderStoreRequest $request){
        $name = 'slider' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path() . '/img/sliders/', $name);
        $data = array_merge($request->validated(), ['image' => $name]);

        Slider::create($data);
        return redirect()->route('Admin.slider.index');
    }

    public function delete(Request $request){
        $id = $request->id;
        $dbImgFileName = Slider::where('id',$id)->first()->image;

        $filePath = public_path("img/sliders/$dbImgFileName");
        if(File::exists($filePath)) {
            File::delete($filePath);
        }

        Slider::find($id)->delete();
        return redirect()->route('Admin.slider.index');
    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('Admin.pages.sliders.edit', compact('slider', 'id'));
    }

    public function update(SliderUpdateRequest $request, $id)
    {
        $dbImgFileName = Slider::where('id',$id)->first()->image;
        $filePath = public_path("img/sliders/$dbImgFileName");
        if(File::exists($filePath)) File::delete($filePath);
        $name = 'slider' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path() . '/img/sliders/', $name);
        $data = array_merge($request->validated(), ['image' => $name]);
        Slider::where('id', $id)->update($data);

        return redirect()->route('Admin.slider.index');
    }

    public function export()
    {
        return Excel::download(new SlidersExport, 'sliders.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new SlidersImport, $file);
        return redirect()->back()->with('success', 'Sliders imported successfully');
    }
}
