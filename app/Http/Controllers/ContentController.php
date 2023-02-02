<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller
{
    /**
     * edit record in content table
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $request->validate([
            'text_en' => 'required|string|max:1800',
            'text_ge' => 'required|string|max:1800'
        ]);

        $content = Content::find($id);

        if (!$content) {
            return redirect()->route('dashboard')->with('error', 'Content not found');
        }

        $content->text = htmlentities($request->input('text_en'));
        $content->text_ge = htmlentities($request->input('text_ge'));
        $content->save();

        return redirect()->back()->with('success', 'Content updated successfully');
    }

    /**
     * delete slider
     *
     * @param $id
     * @return RedirectResponse
     */
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

    /**
     * store new slider
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text_ge' => 'required|string|max:1800',
            'text_en' => 'required|string|max:1800',
            'image' => 'required|image'
        ]);

        $slider = new Content();
        if (!$slider->isStorable()) {
            return redirect()->back();
        }

        $image = $request->file('image');
        $slider->text = strip_tags($validatedData['text_en']);
        $slider->text_ge = strip_tags($validatedData['text_ge']);
        $slider->section = 'slider';
        $slider->page = 'home';
        $slider->description = 'სლაიდერის ტექსტი';
        $slider->uri = time().$image->getClientOriginalName();

        if ($slider->save()) {
            $image->move(public_path().'/assets/images', $slider->uri);
        }

        return redirect()->back();
    }

    /**
     * change slider and about images
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function changeImage(Request $request, $id)
    {
        $request->validate(['image' => 'required|image']);
        $content = Content::find($id);

        if (!$content) {
            return redirect()->back()->withErrors(['Content not found']);
        }

        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $imagePath = public_path("assets/images/$imageName");

        try {
            if ($content->update([
                'uri' => $imageName,
            ])) {
                $image->move(public_path().'/assets/images', $imageName);

                if ($content->uri && file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        } catch (\Exception $e) {
            Log::error("Error updating content with ID $id: " . $e->getMessage());
            return redirect()->back()->withErrors(['Error updating content']);
        }

        return redirect()->back();
    }
}
