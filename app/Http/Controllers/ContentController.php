<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller
{
    public function edit(Request $request, $id)
    {
        $inputs = $request->validate(['text_en'=>'required|string|max:1800',
                                      'text_ge'=>'required|string|max:1800' ]);
        $content = Content::find($id);

        if($content){
            $content->text = strip_tags($inputs['text_en']);
            $content->text_ge = strip_tags($inputs['text_ge']);
            $content->save();
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $slider = Content::find($id);
        if (!$slider) {
            Log::error("Content with ID $id not found");
            return redirect()->back();
        }

        if (!$slider->isDeletable($slider->section)) {
            Log::error("Content with ID $id is not deletable");
            return redirect()->back();
        }

        try {
            $file_path = public_path("assets/images/$slider->uri");
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $slider->delete();

        } catch (\Exception $e) {
            Log::error("Error deleting content with ID $id: " . $e->getMessage());
        }

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'text_ge'=>'required|string|max:1800',
            'text_en'=>'required|string|max:1800',
            'image'=>'required|image'
        ]);
        $slider = new Content();
        if ($slider->isStorable()){
            $image = $request->file('image');
            $slider->text = strip_tags($inputs['text_en']);
            $slider->text_ge = strip_tags($inputs['text_ge']);
            $slider->section = 'slider';
            $slider->page = 'home';
            $slider->description = 'სლაიდერის ტექსტი';
            $slider->uri = time().$image->getClientOriginalName();
            if ( $slider->save() ){
                $image->move(public_path().'/assets/images',$slider->uri);
            }
        }
        return redirect()->back();
    }

    public function changeImage(Request $request, $id)
    {
        $request->validate(['image'=>'required|image']);
        $content = Content::find($id);

        if ($content->hasPicture($content->section)){
            $oldImage = $content->uri;
            $image = $request->file('image');
            $content->uri = time().$image->getClientOriginalName();
            try {
                if ($content->save()){
                    $image->move(public_path().'/assets/images', $content->uri);
                    $file_path = public_path("assets/images/$oldImage");
                    if (File::exists($file_path)) {
                        File::delete($file_path);
                    }
                }
            }   catch (\Exception $e) {
                    Log::error("Error deleting content with ID $id: " . $e->getMessage());
                }
        }
        return redirect()->back();
    }
}
