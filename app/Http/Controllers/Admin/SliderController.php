<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Slider::orderBy('sort_id', 'ASC')->get();
        return view('admin.sliders-list', compact('images'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('admin.slider-add')) {
            return view('admin.slider-add');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $valid = Validator::make($request->all(), [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        // Redirect
        if ($valid->fails()) {
            return redirect()->route('slider.create')->withErrors($valid);
        }
        // Copy to my directory && Save to data base
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $new_name = uniqid(mb_strimwidth($request->name, 0, 3, '_')) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $new_name);
                // array_push($images_paths, $new_name);

                $slider = new Slider();
                $slider->path = $new_name;

                if ($slider->save()) {
                    if ($slider->id == 0) {
                        $slider->sort_id = 1;
                        $slider->save();
                    } else {
                        $slider->sort_id = $slider->id;
                        $slider->save();
                    }
                };
            }
            return redirect('admin-group-1/slider')->with('status', 'Your images has been successfully');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Slider::findOrFail($id);
        //dd($image);
//        $image_path = app_path("images/{$image}");
//        //dd($image_path);
//        if (File::exists($image_path)) {
//            File::delete($image_path);
//            //File::delete("images/{$image}");
//            unlink($image_path);
//        }
//        File::delete(public_path("images/{$image->path}"));
        $image->delete();
        return redirect('admin-group-1/slider');
    }

    public function slider_trash()
    {
        $all_trashed_slider = Slider::onlyTrashed()->get();
        return view('admin.slider-trash-list', compact('all_trashed_slider'));
    }


    public function slider_restore($id)
    {
        $trashed_slider = Slider::withTrashed()->findOrFail($id)->restore();
        if ($trashed_slider) {
            return redirect()->back()->with('status', 'Successfully restored from trash !!!');
        }
    }

    public function slider_remove($id)
    {

        $finel_delete_slider = Slider::withTrashed()->where('id', $id)->get();
        if ($finel_delete_slider[0]->forceDelete()) {
            File::delete(public_path("images/" . $finel_delete_slider[0]->path));

        }
        return redirect()->back()->with('status', 'Successfully deleted from trash !!!');


    }

    public function change_image_order(Request $request)
    {
        //sleep(7);
        $position = 1;
        foreach ($request->ids as $id) {

            Slider::where('id', $id)->update(['sort_id' => $position]);
            $position++;
        }
        return 'ok';
    }

}
