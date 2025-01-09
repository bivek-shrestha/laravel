<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SpecializationController extends Controller
{
    protected $title;
    protected $route;
    protected $imagePath = 'assets/images';

    public function __construct()
    {
        $this->title = 'Specialization';
        $this->route = 'admin.specialization.';
    }

    public function index()
    {
        try {
            $data['Specialization'] = Specialization::all();
            $data['title'] = $this->title;
            $data['route'] = $this->route;

            return view('admin.specialization.index', $data);
        } catch (Exception $e) {
            Log::error('Error fetching specializations: ' . $e->getMessage());
            return back()->with('error', 'Failed to fetch specializations.');
        }
    }

    public function create()
    {
        try {
            $data['title'] = $this->title;
            $data['route'] = $this->route;

            return view('admin.specialization.create', $data);
        } catch (Exception $e) {
            Log::error('Error loading create form: ' . $e->getMessage());
            return back()->with('error', 'Failed to load create form.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'specialization_name' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = null;
            if ($request->hasFile('image')) {
                try {
                    $file = $request->file('image');
                    $extension = $file->extension();
                    $image = time() . '.' . $extension;

                    $file->move(public_path($this->imagePath), $image);
                } catch (Exception $e) {
                    Log::error('Image upload failed: ' . $e->getMessage());
                    return back()
                        ->withInput()
                        ->withErrors(['image' => 'Failed to upload image. Please try again.']);
                }
            }

            Specialization::create([
                'name' => $request->name,
                'specialization_name' => $request->specialization_name,
                'description' => $request->description,
                'image' => $image,
            ]);

            return redirect()
                ->route('admin.specialization.index')
                ->with('success', 'Specialization created successfully.');

        } catch (Exception $e) {
            Log::error('Error creating specialization: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Failed to create specialization.');
        }
    }

    public function edit($id)
    {
        try {
            $data['item'] = Specialization::findOrFail($id);
            $data['title'] = $this->title;
            $data['route'] = $this->route;

            return view('admin.specialization.edit', $data);
        } catch (Exception $e) {
            Log::error('Error loading edit form: ' . $e->getMessage());
            return back()->with('error', 'Failed to load specialization for editing.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $specialization = Specialization::findOrFail($id);

            $request->validate([
                'name' => 'required',
                'specialization_name' => 'required',
                'description' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data = [
                'name' => $request->name,
                'specialization_name' => $request->specialization_name,
                'description' => $request->description,
            ];

            if ($request->hasFile('image')) {
                try {
                    // Delete old image if exists
                    if ($specialization->image) {
                        $oldImagePath = public_path($this->imagePath . '/' . $specialization->image);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    // Upload new image
                    $file = $request->file('image');
                    $extension = $file->extension();
                    $image = time() . '.' . $extension;

                    $file->move(public_path($this->imagePath), $image);
                    $data['image'] = $image;

                } catch (Exception $e) {
                    Log::error('Image upload failed during update: ' . $e->getMessage());
                    return back()
                        ->withInput()
                        ->withErrors(['image' => 'Failed to upload new image. Please try again.']);
                }
            }

            $specialization->update($data);

            return redirect()
                ->route('admin.specialization.index')
                ->with('success', 'Specialization updated successfully.');

        } catch (Exception $e) {
            Log::error('Error updating specialization: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Failed to update specialization.');
        }
    }

    public function destroy($id)
    {
        try {
            $specialization = Specialization::findOrFail($id);

            // Delete image if exists
            if ($specialization->image) {
                $imagePath = public_path($this->imagePath . '/' . $specialization->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $specialization->delete();

            return redirect()
                ->route('admin.specialization.index')
                ->with('success', 'Specialization deleted successfully.');

        } catch (Exception $e) {
            Log::error('Error deleting specialization: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete specialization.');
        }
    }
}