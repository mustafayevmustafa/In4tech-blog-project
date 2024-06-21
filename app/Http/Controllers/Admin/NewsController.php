<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use App\Models\News;
use App\Models\NewsTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index(){
        $news = News::with('translations')->get();
        Log::info('gdgghdg');

        return view('admin.pages.news.index', compact('news'));
    }

    public function create(){
        $news = News::get();

        return view('admin.pages.news.create', compact('news'));
    }

    public function store(Request $request){
        $news = News::create();
        $newsTranslations = [];

        $currentLocale = \::getLocale();
        $language = Languages::where('country', $currentLocale)->first();
        $languageId = $language->id;

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

        $news = News::with(['translations' => function($query) use($languageId) {
            $query->where('language_id', $languageId);
        }])->get();


        return view('admin.pages.news.index', compact('news'));
    }
}
