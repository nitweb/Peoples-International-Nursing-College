<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class InstitutionController extends Controller
{
    public function InstitutionList()
    {
        $title = 'Institution List';

        $institutions = Institution::orderBy('serial', 'asc')->orderBy('id', 'asc')->get();

        return view('backend.institution.list', compact('title', 'institutions'));
    } // End Method

    public function InstitutionAdd()
    {
        $title = 'Institution Add';

        return view('backend.institution.add', compact('title'));
    } // End Method

    public function InstitutionStore(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:150',
                'image' => 'required|image|max:1024',
                'description' => 'nullable|string',
                'link' => 'nullable|max:255',
                'serial' => 'nullable|integer',
            ],
            [
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'image.required' => 'Image is required',
                'image.image' => 'Image must be an image',
                'image.max' => 'Image must be less than 1MB',
            ],
        );

        try {
            $data = new Institution();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->link = $request->link;
            $data->serial = $request->serial ?? 0;

            if ($request->file('image')) {
                $image = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image = $manager->read($image);
                $image->toJpeg(80)->save(base_path('public/uploads/institution/' . $name_gen));
                $data->image = 'uploads/institution/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->route('admin.institution.list')->with('success', 'Institution Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while creating institution: ' . $e->getMessage());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        }
    } // End Method

    public function InstitutionEdit($id)
    {
        $title = 'Institution Edit';

        $institution = Institution::findOrFail($id);

        return view('backend.institution.edit', compact('title', 'institution'));
    } // End Method

    public function InstitutionUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'title' => 'required|max:150',
                'status' => 'required',
                'description' => 'nullable|string',
                'link' => 'nullable|max:255',
                'serial' => 'nullable|integer',
                'image' => 'image|max:1024',
            ],
            [
                'id.required' => 'ID is required',
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'status.required' => 'Status is required',
                'image.image' => 'Image must be an image',
                'image.max' => 'Image must be less than 1MB',
            ],
        );

        try {
            $data = Institution::findOrFail($request->id);
            if (!$data) {
                abort(404);
            }
            $data->title = $request->title;
            $data->status = $request->status;
            $data->description = $request->description;
            $data->link = $request->link;
            $data->serial = $request->serial ?? 0;

            if ($request->file('image')) {
                if ($data->image && file_exists(base_path('public/' . $data->image))) {
                    unlink(base_path('public/' . $data->image));
                }
                $image = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image = $manager->read($image);
                $image->toJpeg(80)->save(base_path('public/uploads/institution/' . $name_gen));
                $data->image = 'uploads/institution/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->route('admin.institution.list')->with('success', 'Institution Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating institution: ' . $e->getMessage());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        }
    } // End Method

    public function InstitutionDelete($id)
    {
        DB::beginTransaction();

        try {
            $data = Institution::find($id);
            if ($data->image && file_exists(base_path('public/' . $data->image))) {
                unlink(base_path('public/' . $data->image));
            }
            $data->delete();

            DB::commit();

            return redirect()->route('admin.institution.list')->with('success', 'Institution Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while deleting institution: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}
