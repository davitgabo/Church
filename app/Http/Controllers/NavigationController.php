<?php

namespace App\Http\Controllers;

use App\Models\EnglishContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NavigationController extends Controller
{
    public function render($lang=null, $page=null)
    {
        switch ($lang) {
            case 'en':
                $text = 'text';
                $contents['nav_logo_title']='Zugdidis iveriis yovladwminda tadzari';
                break;
            case 'ge':
                $text = 'text_ge';
                $contents['nav_logo_title']='ზუგდიდის ივერიის ყოვლაწმინდა ღვთისმშობლის სახელობის საკათედრო ტაძარი';
                break;
            default:
                return redirect('/ge/home');
        }

        if (in_array($page,['home','about','contact','gallery','donate'])) {
                $tableData = EnglishContent::where('page',$page)->orwhere('page','all')->get();
                foreach ($tableData as $row) {
                    $key = $row->section;
                    $contents[$key][] = ['text' => $row->$text, 'uri' => $row->uri, 'visibility' => $row->visibility];
                }

                return view('welcome',['component'=> $page,
                                            'contents' => $contents,
                                            'text' => $text,
                                            'lang' => $lang]);
        } else {
                return redirect("/$lang/home");

        }
    }

    public function dash(){
        return view('dashboard');
    }

    public function login(){
        return view('login');
    }
}
