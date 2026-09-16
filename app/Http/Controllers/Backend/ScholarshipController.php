<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ScholarshipController extends Controller
{
    public function ScholarshipList()
    {
        $title = 'Scholarships';

        $scholarship_list = Scholarship::orderBy('display_order')->orderByDesc('id')->get();

        return view('backend.scholarship.list', compact('title', 'scholarship_list'));
    } // End Method

    public function ScholarshipAdd()
    {
        $title = 'Add Scholarship';

        return view('backend.scholarship.add', compact('title'));
    } // End Method

    public function ScholarshipStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'              => 'required|max:150',
            'coverage'           => 'nullable|string|max:150',
            'short_description'  => 'required|string|max:250',
            'eligibility'        => 'nullable|string',
            'long_description'   => 'nullable|string',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'display_order'      => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $scholarship                    = new Scholarship();
            $scholarship->title             = $request->title;
            $scholarship->slug              = Str::slug($request->title) . '-' . Str::random(5);
            $scholarship->coverage          = $request->coverage;
            $scholarship->short_description = $request->short_description;
            $scholarship->eligibility       = $request->eligibility;
            $scholarship->long_description  = $request->long_description;
            $scholarship->display_order     = $request->display_order ?? 0;
            $scholarship->status            = 'active';
            $scholarship->created_by        = Auth::id();

            if ($request->file('image')) {
                $img      = $request->file('image');
                $manager  = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                $manager->read($img)->resize(850, 550)->toJpeg(80)
                    ->save(base_path('public/uploads/scholarships/' . $name_gen));
                $scholarship->image = 'uploads/scholarships/' . $name_gen;
            }

            $scholarship->save();

            DB::commit();
            return redirect()->route('admin.scholarship.list')->with('success', 'Scholarship Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while adding Scholarship: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
        }
    } // End Method

    public function ScholarshipEdit($id)
    {
        $title = 'Edit Scholarship';

        $scholarship_info = Scholarship::findOrFail($id);

        return view('backend.scholarship.edit', compact('title', 'scholarship_info'));
    } // End Method

    public function ScholarshipUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'                 => 'required|integer',
            'title'              => 'required|max:150',
            'coverage'           => 'nullable|string|max:150',
            'short_description'  => 'required|string|max:250',
            'eligibility'        => 'nullable|string',
            'long_description'   => 'nullable|string',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'display_order'      => 'nullable|integer|min:0',
            'status'             => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $scholarship                    = Scholarship::findOrFail($request->id);
            $scholarship->title             = $request->title;
            $scholarship->coverage          = $request->coverage;
            $scholarship->short_description = $request->short_description;
            $scholarship->eligibility       = $request->eligibility;
            $scholarship->long_description  = $request->long_description;
            $scholarship->display_order     = $request->display_order ?? 0;
            $scholarship->status            = $request->status;
            $scholarship->updated_by        = Auth::id();

            if ($request->file('image')) {
                if ($scholarship->image && file_exists(public_path($scholarship->image))) {
                    unlink(public_path($scholarship->image));
                }
                $img      = $request->file('image');
                $manager  = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                $manager->read($img)->resize(850, 550)->toJpeg(80)
                    ->save(base_path('public/uploads/scholarships/' . $name_gen));
                $scholarship->image = 'uploads/scholarships/' . $name_gen;
            }

            $scholarship->save();

            DB::commit();
            return redirect()->back()->with('success', 'Scholarship Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating Scholarship: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
        }
    } // End Method

    public function ScholarshipDelete($id)
    {
        DB::beginTransaction();
        try {
            $scholarship = Scholarship::findOrFail($id);

            if ($scholarship->image && file_exists(public_path($scholarship->image))) {
                unlink(public_path($scholarship->image));
            }

            $scholarship->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Scholarship Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting Scholarship: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}
