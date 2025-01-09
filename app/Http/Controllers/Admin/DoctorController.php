<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialization;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    protected $title;
    protected $route;
    protected $imagePath;

    public function __construct()
    {
        $this->title = 'Doctor';
        $this->route = 'admin.doctors.';
        $this->imagePath = 'assets/images/doctors';
    }

    public function index()
    {
        try {
            $data['doctors'] = Doctor::all();
            $data['title'] = $this->title;
            $data['route'] = $this->route;

            return view('admin.doctors.index', $data);
        } catch (Exception $e) {
            Log::error('Error fetching doctors: ' . $e->getMessage());
            return back()->with('error', 'Failed to fetch doctors.');
        }
    }

    public function create()
    {
        try {
            $data['title'] = $this->title;
            $data['route'] = $this->route;
            $data['specializations'] = Specialization::all();
            return view('admin.doctors.create', $data);
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
                'specialization_id' => 'required',
                'phone' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'degree' => 'required',
                'year_of_completion' => 'required',
                'opd_time' => 'required'
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

            Doctor::create([
                'name' => $request->name,
                'specialization_id' => $request->specialization_id,
                'phone' => $request->phone,
                'image' => $image,
                'degree' => $request->degree,
                'year_of_completion' => $request->year_of_completion,
                'opd_time' => $request->opd_time,
            ]);

            return redirect()
                ->route('admin.doctors.index')
                ->with('success', 'Doctor created successfully.');

        } catch (Exception $e) {
            Log::error('Error creating doctor: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Failed to create doctor.');
        }
    }

    public function edit($id)
    {
        try {
            $data['doctor'] = Doctor::findOrFail($id);
            $data['title'] = $this->title;
            $data['route'] = $this->route;

            return view('admin.doctors.edit', $data);
        } catch (Exception $e) {
            Log::error('Error loading edit form: ' . $e->getMessage());
            return back()->with('error', 'Failed to load doctor for editing.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $doctor = Doctor::findOrFail($id);

            $request->validate([
                'name' => 'required',
                'specialization_id' => 'required',
                'phone' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'degree' => 'required',
                'year_of_completion' => 'required',
                'opd_time' => 'required'
            ]);

            $data = [
                'name' => $request->name,
                'specialization_id' => $request->specialization_id,
                'phone' => $request->phone,
                'degree' => $request->degree,
                'year_of_completion' => $request->year_of_completion,
                'opd_time' => $request->opd_time,
            ];

            if ($request->hasFile('image')) {
                try {
                    // Delete old image if exists
                    if ($doctor->image) {
                        $oldImagePath = public_path($this->imagePath . '/' . $doctor->image);
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

            $doctor->update($data);

            return redirect()
                ->route('admin.doctors.index')
                ->with('success', 'Doctor updated successfully.');

        } catch (Exception $e) {
            Log::error('Error updating doctor: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Failed to update doctor.');
        }
    }

    public function destroy($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);

            // Delete image if exists
            if ($doctor->image) {
                $imagePath = public_path($this->imagePath . '/' . $doctor->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $doctor->delete();

            return redirect()
                ->route('admin.doctors.index')
                ->with('success', 'Doctor deleted successfully.');

        } catch (Exception $e) {
            Log::error('Error deleting doctor: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete doctor.');
        }
    }
}
