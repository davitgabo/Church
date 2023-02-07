<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'desc_ge'=>'nullable|string|max:1800',
            'desc_en'=>'nullable|string|max:1800',
            'image'=>'required|image'
        ]);

        $image = new Image();
        $picture = $request->file('image');
        $image->desc_en = strip_tags($inputs['desc_en']);
        $image->desc_ge = strip_tags($inputs['desc_ge']);
        $image->name = time().$picture->getClientOriginalName();
            if ( $image->save() ){
                $picture->move(public_path().'/assets/images',$image->name);
            }
        return redirect()->back();
    }

    public function delete($id)
    {
        $image = Image::find($id);
        if (!$image) {
            Log::error("Content with ID $id not found");
            return redirect()->back();
        }

        try {
            $file_path = public_path("assets/images/$image->name");
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $image->delete();
        } catch (\Exception $e) {
            Log::error("Error deleting content with ID $id: " . $e->getMessage());
        }

        return redirect()->back();
    }

    public function change(Request $request, $id)
    {
        $inputs = $request->validate(['desc_en'=>'required|string|max:1800',
                                      'desc_ge'=>'required|string|max:1800',
                                      'image'=>'image']);
        $image = Image::find($id);
        if (!$image) {
            Log::error("Content with ID $id not found");
            return redirect()->back();
        }
        $image->desc_en = strip_tags($inputs['desc_en']);
        $image->desc_ge = strip_tags($inputs['desc_ge']);

        if( $request->hasFile('image') ){
            $picture = $request->file('image');
            $image->name = time().$picture->getClientOriginalName();
            $picture->move(public_path().'/assets/images',$image->name);
        }
        $image->save();
        return redirect()->back();
    }
}
