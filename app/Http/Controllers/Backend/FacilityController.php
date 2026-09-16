<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class FacilityController extends Controller
{
    public function FacilityList()
    {
        $title = 'Campus & Facilities';

        $facility_list = Facility::orderBy('display_order')->orderByDesc('id')->get();

        return view('backend.facility.list', compact('title', 'facility_list'));
    } // End Method

    public function FacilityAdd()
    {
        $title = 'Add Facility';

        return view('backend.facility.add', compact('title'));
    } // End Method

    public function FacilityStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'              => 'required|max:150',
            'short_description'  => 'required|string|max:250',
            'long_description'   => 'nullable|string',
            'icon'               => 'nullable|string|max:100',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'display_order'      => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $facility                    = new Facility();
            $facility->title             = $request->title;
            $facility->slug              = Str::slug($request->title) . '-' . Str::random(5);
            $facility->icon              = $request->icon;
            $facility->short_description = $request->short_description;
            $facility->long_description  = $request->long_description;
            $facility->display_order     = $request->display_order ?? 0;
            $facility->status            = 'active';
            $facility->created_by        = Auth::id();

            if ($request->file('image')) {
                $img      = $request->file('image');
                $manager  = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                $manager->read($img)->resize(850, 550)->toJpeg(80)
                    ->save(base_path('public/uploads/facilities/' . $name_gen));
                $facility->image = 'uploads/facilities/' . $name_gen;
            }

            $facility->save();

            DB::commit();
            return redirect()->route('admin.facility.list')->with('success', 'Facility Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while adding Facility: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
        }
    } // End Method

    public function FacilityEdit($id)
    {
        $title = 'Edit Facility';

        $facility_info = Facility::findOrFail($id);

        return view('backend.facility.edit', compact('title', 'facility_info'));
    } // End Method

    public function FacilityUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'                 => 'required|integer',
            'title'              => 'required|max:150',
            'short_description'  => 'required|string|max:250',
            'long_description'   => 'nullable|string',
            'icon'               => 'nullable|string|max:100',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'display_order'      => 'nullable|integer|min:0',
            'status'             => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $facility                    = Facility::findOrFail($request->id);
            $facility->title             = $request->title;
            $facility->icon              = $request->icon;
            $facility->short_description = $request->short_description;
            $facility->long_description  = $request->long_description;
            $facility->display_order     = $request->display_order ?? 0;
            $facility->status            = $request->status;
            $facility->updated_by        = Auth::id();

            if ($request->file('image')) {
                if ($facility->image && file_exists(public_path($facility->image))) {
                    unlink(public_path($facility->image));
                }
                $img      = $request->file('image');
                $manager  = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                $manager->read($img)->resize(850, 550)->toJpeg(80)
                    ->save(base_path('public/uploads/facilities/' . $name_gen));
                $facility->image = 'uploads/facilities/' . $name_gen;
            }

            $facility->save();

            DB::commit();
            return redirect()->back()->with('success', 'Facility Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while updating Facility: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
        }
    } // End Method

    public function FacilityDelete($id)
    {
        DB::beginTransaction();
        try {
            $facility = Facility::findOrFail($id);

            if ($facility->image && file_exists(public_path($facility->image))) {
                unlink(public_path($facility->image));
            }

            $facility->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Facility Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred while deleting Facility: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}
