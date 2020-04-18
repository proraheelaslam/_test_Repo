<?php

namespace App\Http\Controllers;

use Hashids;
use Illuminate\Support\Facades\App;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use App\Models\Page;
use DB;
use Carbon\Carbon;
class ContentPageController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('preventBackHistory');
	}


    public function  index($key=''){

        $lang_key = App::getLocale();

        $page = Page::where('key', $key)->first();

        if($lang_key=='gr'){

            $page->name = $page->name_gr;
            $page->content = $page->content_gr;
            $page->meta_title = $page->meta_title_gr;
            $page->meta_description = $page->meta_description_gr;
            $page->meta_keywords = $page->meta_keywords_gr;

        }else if($lang_key=='ru'){
            $page->name= $page->name_ru;
            $page->content = $page->content_ru;
            $page->meta_title = $page->meta_title_ru;
            $page->meta_description = $page->meta_description_ru;
            $page->meta_keywords = $page->meta_keywords_ru;
        }
        else if($lang_key=='he'){
            $page->name = $page->name_he;
            $page->content = $page->content_he;
            $page->meta_title = $page->meta_title_he;
            $page->meta_description = $page->meta_description_he;
            $page->meta_keywords = $page->meta_keywords_he;
        }
        $meta_title = $page->meta_title;
        $meta_description = $page->meta_description;
        $meta_keywords = $page->meta_keywords;
        return view('student.page_content',compact('page', 'meta_title', 'meta_description', 'meta_keywords'));

    }


}
