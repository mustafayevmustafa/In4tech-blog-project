<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use App\Models\News;
use App\Models\NewsTranslation;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::with('translations')->get();

        return view('admin.pages.news.index', compact('news'));
    }

    public function create(){
        $news = News::get();

        return view('admin.pages.news.create', compact('news'));
    }

    public function store(Request $request){
        $news = News::create();
        $newsTranslations = [];

        foreach (Languages::all() as $language) {
            $newsTranslations[] = [
                'news_id' => $news->id,
                'language_id' => $language->id,
                'title' => $request->title[$language->country]
            ];
        }

        if( !empty($newsTranslations) ) {
            NewsTranslation::Insert($newsTranslations);
        }


        return view('admin.index');
    }
}
