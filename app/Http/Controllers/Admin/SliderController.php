<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.pages.sliders.index', ['sliders' => $sliders]);
    }

    public function create()
    {
        return view('admin.pages.sliders.create');
    }

    public function store(SliderStoreRequest $request)
    {
        $valid_slider = $request->validated();
        $name = 'slider-' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(Paths::filePaths([public_path()], ['sliders'])[0], $name);
        $valid_slider['image'] = $name;

        Slider::create($valid_slider);
        return redirect('admin/sliders');
    }

    public function destroy(Slider $slider)
    {
        $path = Paths::filePaths([public_path()], [Paths::filePaths(['sliders'], [$slider->image])[0]])[0];
        if (File::exists($path)) File::delete($path);
        $slider->delete();

        return redirect('admin/sliders');
    }

    public function edit(Slider $slider)
    {
        return view('admin.pages.sliders.edit', ['slider' => $slider]);
    }

    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        $valid_slider = $request->validated();

        // old image delete
        // $path = Paths::filePaths([public_path()], [Paths::filePaths(['sliders'], [$slider->image])[0]])[0];
        // if (File::exists($path)) File::delete($path);

        // if ($request->hasFile('image')) {
        //     $name = 'slider-' . time() . '.' . $request->file('image')->extension();
        //     $request->file('image')->move(Paths::filePaths([public_path()], ['sliders'])[0], $name);
        //     $valid_slider['image'] = $name;
        // }

        $slider->update($valid_slider);
        return redirect('admin/sliders');
    }
}
