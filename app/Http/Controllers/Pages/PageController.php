<?php

namespace App\Http\Controllers\Pages;

use App\Models\Faq;
use App\Models\FaqType;
use App\Models\Page;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    //

    public function aboutUs(){

        $lang_key = App::getLocale();
        $page = Page::where('key', 'about-us')->first();
        if (!is_null($page)) {

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

            $who_we_are = Page::where('key', 'who-we-are')->first();
            if($lang_key=='gr'){

                $who_we_are->name = $who_we_are->name_gr;
                $who_we_are->content = $who_we_are->content_gr;
                $who_we_are->meta_title = $who_we_are->meta_title_gr;
                $who_we_are->meta_description = $who_we_are->meta_description_gr;
                $who_we_are->meta_keywords = $who_we_are->meta_keywords_gr;

            }else if($lang_key=='ru'){
                $who_we_are->name= $who_we_are->name_ru;
                $who_we_are->content = $who_we_are->content_ru;
                $who_we_are->meta_title = $who_we_are->meta_title_ru;
                $who_we_are->meta_description = $who_we_are->meta_description_ru;
                $who_we_are->meta_keywords = $who_we_are->meta_keywords_ru;
            }
            else if($lang_key=='he'){
                $who_we_are->name = $who_we_are->name_he;
                $who_we_are->content = $who_we_are->content_he;
                $who_we_are->meta_title = $who_we_are->meta_title_he;
                $who_we_are->meta_description = $who_we_are->meta_description_he;
                $who_we_are->meta_keywords = $who_we_are->meta_keywords_he;
            }
            return view('student.pages.about_us_page', compact('page','who_we_are',  'meta_title', 'meta_keywords', 'meta_description'));
        }
    }

    public function contactUs(){

        $page = $this->getSinglePageInfo('contact');

        $meta_title = $page->meta_title;
        $meta_description = $page->meta_description;
        $meta_keywords = $page->meta_keywords;
        return view('student.pages.contact_us_page', compact('page',  'meta_title', 'meta_keywords', 'meta_description'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function sendMessage(Request $request){

          $this->validate($request, [
              'full_name' => 'required',
              'email' => 'required|email',
              'message' => 'required',
              'subject' => 'required',
             ]);
          $toEmail = Settings::select('value')->where('key', 'contact_us_email')->first()->value;
          $message = '<p>Hi {username},</p><br/>
                     <p>{message}</p><br/>';
          $message = str_replace('{username}', $request->full_name, $message);
          $message = str_replace('{message}', $request->message, $message);
          $email['email_message'] = $message;
          $email['email_subject'] = $request->title;
          $email['email_to'] = $toEmail;
          try{
              $this->sendEmail($email);
              Session::flash('success_message', 'Message has been sent on given email.');
              return redirect('contact_us');

      }catch (\Exception $e){
          Session::flash('success_message', 'Message has been not sent given email.');
              return redirect('contact_us');
          return [ 'message' => $e->getMessage()];
      }

    }

    public function faq(){

        $page = $this->getSinglePageInfo('faq');
        $meta_title = $page->meta_title;
        $meta_description = $page->meta_description;
        $meta_keywords = $page->meta_keywords;
         $faqData = FaqType::with('faqs')->get();
         return view('student.pages.faq_page', compact('faqData','page',  'meta_title', 'meta_keywords', 'meta_description'));
    }


    public function privacyPolicy(){

        $page = $this->getSinglePageInfo('privacy-policy');
        $meta_title = $page->meta_title;
        $meta_description = $page->meta_description;
        $meta_keywords = $page->meta_keywords;
        return view('student.pages.privacy_policy_page', compact('page',  'meta_title', 'meta_keywords', 'meta_description'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function siteMap(){

        $page = $this->getSinglePageInfo('site-map');
  
        $meta_title = $page->meta_title;
        $meta_description = $page->meta_description;
        $meta_keywords = $page->meta_keywords;
        return view('student.pages.site_map', compact('page',  'meta_title', 'meta_keywords', 'meta_description'));

    }

    public function termsCondition(){

        $page = $this->getSinglePageInfo('terms-and-condition');
        $meta_title = $page->meta_title;
        $meta_description = $page->meta_description;
        $meta_keywords = $page->meta_keywords;
        return view('student.pages.terms_condition_page', compact('page',  'meta_title', 'meta_keywords', 'meta_description'));
    }


    /**
     * @param $key
     * @return mixed
     */
    public function getSinglePageInfo($key){

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


        return $page;
    }

}
