<?php

namespace App\Http\Controllers\Backend\Donation;

use App\Http\Controllers\Controller;
use App\Models\DonationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class DonationCategoryController extends Controller
{
    public function DonationCategoryList()
    {
        $title = 'Donation Categories';

        $categories = DonationCategory::orderBy('serial', 'asc')->orderBy('id', 'desc')->get();

        return view('backend.donation.category_list', compact('title', 'categories'));
    } // End Method

    public function DonationCategoryAdd()
    {
        $title = 'Add Donation Category';

        return view('backend.donation.category_add', compact('title'));
    } // End Method

    public function DonationCategoryStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:150',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'short_description' => 'required|string|max:500',
                'description' => 'required|string',
                'target_amount' => 'nullable|numeric|min:0',
            ],
            [
                'title.required' => 'Title is required',
                'image.required' => 'Cover image is required',
                'image.image' => 'File must be an image',
                'image.mimes' => 'Image must be jpeg, png, jpg or webp',
                'image.max' => 'Image must be less than 2MB',
                'short_description.required' => 'Short description is required',
                'description.required' => 'Description is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $category = new DonationCategory();
            $category->title = $request->title;
            $category->slug = Str::slug($request->title) . '-' . Str::random(4);
            $category->short_description = $request->short_description;
            $category->description = $request->description;
            $category->target_amount = $request->target_amount;
            $category->is_featured = $request->boolean('is_featured');
            $category->serial = $request->serial ?? 0;
            $category->status = $request->status ?? 'active';
            $category->created_by = Auth::id();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $image = $manager->read($file);
                $image->resize(700, 500);

                if (! File::isDirectory(base_path('public/uploads/donations'))) {
                    File::makeDirectory(base_path('public/uploads/donations'), 0755, true);
                }

                $image->toJpeg(80)->save(base_path('public/uploads/donations/' . $name_gen));
                $category->image = 'uploads/donations/' . $name_gen;
            }

            $category->save();

            DB::commit();

            return redirect()->route('admin.donation-category.list')->with('success', 'Donation category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('DonationCategoryStore Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function DonationCategoryEdit($id)
    {
        $title = 'Edit Donation Category';

        $category = DonationCategory::findOrFail($id);

        return view('backend.donation.category_edit', compact('title', 'category'));
    } // End Method

    public function DonationCategoryUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer|exists:donation_categories,id',
                'title' => 'required|max:150',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'short_description' => 'required|string|max:500',
                'description' => 'required|string',
                'target_amount' => 'nullable|numeric|min:0',
                'status' => 'required|in:active,inactive',
            ],
            [
                'title.required' => 'Title is required',
                'short_description.required' => 'Short description is required',
                'description.required' => 'Description is required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $category = DonationCategory::findOrFail($request->id);
            $category->title = $request->title;
            $category->short_description = $request->short_description;
            $category->description = $request->description;
            $category->target_amount = $request->target_amount;
            $category->is_featured = $request->boolean('is_featured');
            $category->serial = $request->serial ?? 0;
            $category->status = $request->status;
            $category->updated_by = Auth::id();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $image = $manager->read($file);
                $image->resize(700, 500);
                $image->toJpeg(80)->save(base_path('public/uploads/donations/' . $name_gen));

                if ($category->image && File::exists(base_path('public/' . $category->image))) {
                    File::delete(base_path('public/' . $category->image));
                }

                $category->image = 'uploads/donations/' . $name_gen;
            }

            $category->save();

            DB::commit();

            return redirect()->route('admin.donation-category.list')->with('success', 'Donation category updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('DonationCategoryUpdate Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    } // End Method

    public function DonationCategoryDelete($id)
    {
        $category = DonationCategory::findOrFail($id);

        if ($category->image && File::exists(base_path('public/' . $category->image))) {
            File::delete(base_path('public/' . $category->image));
        }

        $category->delete();

        return redirect()->back()->with('success', 'Donation category deleted successfully.');
    } // End Method
}
