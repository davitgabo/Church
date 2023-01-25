<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function edit(Request $request, $id)
    {
        $inputs = $request->validate(['text_en'=>'required|string|max:1800',
                                      'text_ge'=>'required|string|max:1800' ]);

        $inputs = array_map(function($value){
            return strip_tags($value);
        },$inputs);

        $content = Content::find($id);

        if($content){
            $content->text = $inputs['text_en'];
            $content->text_ge = $inputs['text_ge'];
            $content->save();
        }
        return to_route('dashboard');
    }
}
