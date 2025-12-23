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
        $content = Content::find($id);

        if (!$content) {
            return redirect()->route('dashboard')->with('error', 'Content not found');
        }

        if (in_array($content->text,['Facebook','Instagram','Twitter']) ){
            $request->validate([
                'link' => 'required|string'
            ]);
            $content->uri = $request->input('link');
        } else {
            $request->validate([
                'text_en' => 'required|string',
                'text_ge' => 'required|string',
                'text_ru' => 'required|string',
                'subheader_ge' => 'nullable|string',
                'subheader_en' => 'nullable|string',
                'subheader_ru' => 'nullable|string',
                'news_title_en' => 'nullable|string',
                'news_title_ge' => 'nullable|string',
                'news_title_ru' => 'nullable|string',
                'video_url' => 'sometimes|nullable|max:120',
                'is_slider' => 'sometimes|nullable|bool'
            ]);
            $content->text = $request->input('text_en');
            $content->text_ge = $request->input('text_ge');
            $content->text_ru = $request->input('text_ru');
            $content->subheader_ge = $request->input('subheader_ge');
            $content->subheader_en = $request->input('subheader_en');
            $content->subheader_ru = $request->input('subheader_ru');
            $content->news_title_en = $request->input('news_title_en');
            $content->news_title_ge = $request->input('news_title_ge');
            $content->news_title_ru = $request->input('news_title_ru');
            $content->is_slider = $request->input('is_slider');
        }

        if ($request->has('video_url')){
            $url = $request->input('video_url');

            // Parse the URL and get the query string
            parse_str(parse_url($url, PHP_URL_QUERY), $query);

            // Get the value of the 'v' parameter, which is the video ID and save to slider model
            $content->video_id = strip_tags( $query['v'] ?? $request->input('video_url'));
        }
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
            'text_ge' => 'required|string',
            'text_en' => 'required|string',
            'text_ru' => 'required|string',
            'subheader_ge' => 'nullable|string',
            'subheader_en' => 'nullable|string',
            'subheader_ru' => 'nullable|string',
            'news_title_en' => 'nullable|string',
            'news_title_ge' => 'nullable|string',
            'news_title_ru' => 'nullable|string',
            'image' => 'required|image|max:2560',
            'video_url' => 'sometimes|nullable|string',
            'is_slider' => 'nullable|bool'
        ]);

        $slider = new Content();

        if (!$slider->isStorable()) {
            return redirect()->back();
        }

        $image = $request->file('image');
        $slider->text = strip_tags($validatedData['text_en']);
        $slider->text_ge = strip_tags($validatedData['text_ge']);
        $slider->text_ru = strip_tags($validatedData['text_ru']);
        $slider->subheader_en = strip_tags($validatedData['subheader_en']);
        $slider->subheader_ge = strip_tags($validatedData['subheader_ge']);
        $slider->subheader_ru = strip_tags($validatedData['subheader_ru']);
        $slider->news_title_en = strip_tags($validatedData['news_title_en']);
        $slider->news_title_ge = strip_tags($validatedData['news_title_ge']);
        $slider->news_title_ru = strip_tags($validatedData['news_title_ru']);
        $slider->is_slider = $validatedData['is_slider'] ?? false;
        $slider->section = 'slider';
        $slider->page = 'home';
        $slider->description = 'სლაიდერის ტექსტი';
        $slider->uri = time().$image->getClientOriginalName();

        if($request->has('video_url')){
            $url = $validatedData['video_url'];

            // Parse the URL and get the query string
            parse_str(parse_url($url, PHP_URL_QUERY), $query);

            // Get the value of the 'v' parameter, which is the video ID and save to slider model
            $slider->video_id = strip_tags( $query['v'] ?? $request->input('video_url'));
        }
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
        $request->validate(['image' => 'required|image|max:2560']);
        $content = Content::find($id);

        if (!$content) {
            return redirect()->back()->withErrors(['Content not found']);
        }

        $image = $request->file('image');
        $imagePath = public_path("assets/images/$content->uri");
        $content->uri = time() . $image->getClientOriginalName();

        try {
            if ($content->save()) {
                $image->move(public_path().'/assets/images', $content->uri);

                if ($content->uri && file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        } catch (\Exception $e) {
            Log::error("Error updating content with ID $id: " . $e->getMessage());
        }

        return redirect()->back();
    }

    public function hideDonation(Request $request)
    {
        $request->validate(['hide' => 'required|bool']);

        if ($request->input('hide')) {
            Content::where('id', '4')->update(['visibility' => 'hide']);
        } else {
            Content::where('id','4')->update(['visibility' => 'show']);
        }

        return redirect()->back();
    }
}
