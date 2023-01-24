<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function render($page=null)
    {
        $allowedUri = ['home','about','contact','gallery','donate'];

        if (in_array($page,$allowedUri)){
            return view('welcome',['component'=> $page]);
        } else{
            return redirect('/home');
        }
    }
}
