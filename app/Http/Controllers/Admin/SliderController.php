<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $title;
    protected $route;
    public function __construct()
    {
        $this->title = 'Slider';
        $this->route = 'admin.slider.';
    }
    public function index()
    {
        $data['slider'] = Slider::all();
        $data['title'] = $this->title;
        $data['route'] = $this->route;

        return view('admin.slider.index', $data);
    }
    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;

        return view('admin.slider.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            // 'sub_title' => 'required',

            'status' => ['required', 'in:active,inactive'],

        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            try {
                $extension = $request->image->extension();
                $imageName = time() . '.' . $extension;
                $request->image->move(public_path('assets/images'), $imageName);
            } catch (Exception $e) {
                return back()->withErrors(['image' => 'Failed to upload image. Please try again.']);
            }
        }

        $slider = Slider::create([
            'image' => $imageName,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'status' => $request->status,



        ]);
        // toast('Slider added successfully!', 'success');
        return redirect()->route('admin.slider.index');
    }


    public function edit($id,)
    {
        $data['item'] = Slider::find($id);
        $data['title'] = $this->title;
        $data['route'] = $this->route;

        return view('admin.slider.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'subtitle' => 'nullable',
            'status' => ['required', 'in:active,inactive'],
        ]);
        $sliders = Slider::findOrFail($id);

        $imageName = $sliders->image; // Keep the current image name by default

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            try {
                // Delete the old image if it exists
                if ($sliders->image && file_exists(public_path('assets/images' . $sliders->image))) {
                    unlink(public_path('assets/images' . $sliders->image));
                }

                // Save the new image
                $extension = $request->image->extension();
                $imageName = time() . '.' . $extension;
                $request->image->move(public_path('assets/images'), $imageName);
            } catch (Exception $e) {
                return back()->withErrors(['image' => 'Failed to upload image. Please try again.']);
            }
        }

        $sliders = Slider::findOrFail($id);
        $sliders->update(['image' => $imageName,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'status' => $request->status,


        ]);
        // toast('Slider updated successfully!', 'success');
        return redirect()->route('admin.slider.index');
    }

    public function destroy($id)
    {
        Slider::find($id)->delete();
        // toast('Slider deleted successfully!', 'success');
        return redirect()->route('admin.slider.index');
    }
    public function show($id)
    {
        $data['slider'] = Slider::findOrFail($id);
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $sliders = Slider::findOrFail($id);
        return view('admin.slider.create',  $data);
    }
}
