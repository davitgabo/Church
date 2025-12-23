<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Donation;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Madcoda\Youtube\Youtube;

class NavigationController extends Controller
{
    public function render($lang=null, $page=null, $id=null)
    {
        // detect chosen language
        switch ($lang) {
            case 'en':
                $text = 'text';
                $contents['nav_logo_title'][0]='Zugdidi Cathedral Church';
                $contents['nav_logo_title'][1]='of the All Holy Mother of God Iveria';
                break;
            case 'ge':
                $text = 'text_ge';
                $contents['nav_logo_title'][0]='ზუგდიდის ივერიის ყოვლაწმინდა ღვთისმშობლის';
                $contents['nav_logo_title'][1]='სახელობის საკათედრო ტაძარი';
                break;
            case 'ru':
                $text = 'text_ru';
                $contents['nav_logo_title'][0]='ზუგდიდის ივერიის ყოვლაწმინდა ღვთისმშობლის';
                $contents['nav_logo_title'][1]='სახელობის საკათედრო ტაძარი';
                break;
            default:
                return redirect('/ge/home');
        }

        //check for hidden pages
        if (($page == 'donate' || $page == 'payment') && Content::invisible()){
            return redirect("/$lang/home");
        }

        //check for allowed url
        if (in_array($page,['home','about','news','contact','gallery','donate','payment','video','all-news'])) {
                $tableData = Content::where('page',$page)->orwhere('page','all')->get();
                foreach ($tableData as $row) {

                    $key = $row->section;
                    $news_title = 'news_title_'.$lang;
                    $subheader = 'subheader_'.$lang;
                    $contents[$key][] = [
                        'id'=>$row->id,
                        'text' => $row->$text,
                        'news_title' => $row->$news_title,
                        'subheader' => $row->$subheader,
                        'uri' => $row->uri,
                        'visibility' => $row->visibility,
                        'video_id' => $row->video_id,
                        'is_slider' => $row->is_slider
                    ];
                }

                if ($id){
                    $sliderRecord = Content::find($id);
                    if($sliderRecord->video_id){
                        $slider['title'] = $this->video($sliderRecord->video_id);
                    } else {
                        $title = 'news_title_'.$lang;
                        $slider['title'] = $sliderRecord->$title;
                        $slider['subheader'] = $sliderRecord->$subheader;
                    }
                    $slider['uri'] = $sliderRecord->uri;
                    $slider['text'] = $sliderRecord->$text;
                    $slider['video_id'] = $sliderRecord->video_id;
                    $slider['created_at'] = $sliderRecord->created_at;
                }
                $homeNews = Content::where('section','slider')->orderByDesc('created_at')->paginate(3);
                $news = Content::where('section','slider')->orderByDesc('created_at')->paginate(5);
                return view('welcome',[
                    'component'=> $page,
                    'contents' => $contents,
                    'images' => Image::all(),
                    'slider' => $slider ?? null,
                    'homeNews' => $homeNews,
                    'news' => $news,
                    'lang' => $lang,
                    'donated' => Donation::where('status','approved')->sum('amount'),
                    'payment' => $this->generateUniqueNumber(),
                    'donations' => Donation::where('status', 'approved')->where('public', true)->orderByDesc('created_at')->get(),
                ]);
        } else {
                return redirect("/$lang/home");
        }
    }

    public function dash($page)
    {
        if (in_array($page,['dashboard','images','donations'])) {
            $tableData = Content::all();
            foreach ($tableData as $row) {
                $key = $row->page;
                $contents[$key][] = [ 'id'=>$row->id,
                    'text_ge' => $row->text_ge,
                    'text'=> $row->text,
                    'text_ru' => $row->text_ru,
                    'news_title_ge' => $row->news_title_ge,
                    'news_title_ru' => $row->news_title_ru,
                    'news_title_en' => $row->news_title_en,
                    'subheader_ge' => $row->subheader_ge,
                    'subheader_en' => $row->subheader_en,
                    'subheader_ru' => $row->subheader_ru,
                    'uri' => $row->uri,
                    'video_id' => $row->video_id,
                    'is_slider' => $row->is_slider,
                    'visibility' => $row->visibility,
                    'title' => $row->description];
            }

            return view('dashboard',[
                'contents' => $contents,
                'images' => Image::all(),
                'donations' => Donation::orderByDesc('created_at')->get(),
                'component' => $page,
                'sliders' => Content::where('section','slider')->get(),
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function login(){
        return view('login');
    }

    function generateUniqueNumber() {
        do {
            $number = rand(10000, 99999);
            $exists = Donation::where('payment_title', $number)->exists();
        } while ($exists);

        return $number;
    }

    function video($videoId){
        // Set up the Google client object with your API key
        $config = [
            'key' => env('YOUTUBE_API_KEY')
        ];
        $youtube = new Youtube($config);
        $video = $youtube->getVideoInfo($videoId);
        return $video->snippet->title;
    }
}
