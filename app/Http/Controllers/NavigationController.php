<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Donation;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NavigationController extends Controller
{
    public function render($lang=null, $page=null)
    {
        switch ($lang) {
            case 'en':
                $text = 'text';
                $contents['nav_logo_title']='ST.VIRGIN MARY ICON OF THE IVERON CHURCH';
                break;
            case 'ge':
                $text = 'text_ge';
                $contents['nav_logo_title']='ზუგდიდის ივერიის ყოვლაწმინდა ღვთისმშობლის სახელობის საკათედრო ტაძარი';
                break;
            default:
                return redirect('/ge/home');
        }

        if (($page == 'donate' || $page == 'payment') && Content::invisible()){
            return redirect("/$lang/home");
        }

        if (in_array($page,['home','about','contact','gallery','donate','payment'])) {
                $tableData = Content::where('page',$page)->orwhere('page','all')->get();
                foreach ($tableData as $row) {
                    $key = $row->section;
                    $contents[$key][] = ['text' => $row->$text, 'uri' => $row->uri, 'visibility' => $row->visibility];
                }

                return view('welcome',['component'=> $page,
                                            'contents' => $contents,
                                            'text' => $text,
                                            'lang' => $lang,
                                            'payment' => $this->generateUniqueNumber()]);
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
                    'uri' => $row->uri,
                    'visibility' => $row->visibility,
                    'title' => $row->description];
            }
            $gallery = Image::all();
            $donations = Donation::all();
            $sliders = Content::where('section','slider')->get();
            return view('dashboard',['contents'=> $contents,
                                          'images'=> $gallery,
                                          'donations'=>$donations,
                                          'component' => $page,
                                          'sliders'=>$sliders]);
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
}
