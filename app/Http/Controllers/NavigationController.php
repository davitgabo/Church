<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function render($page)
    {
        if (in_array($page,['home','about','contact','donate'])){
            return view('welcome',['component'=> $page]);
        } else{
            return redirect('/');
        }
    }
}
