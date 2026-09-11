<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function FontAwesome()
    {
        $title = 'FontAwesome List';
        $icons = icons();

        return view('backend.setting.font_awesome', compact('title'));
    } // End Method

    public function searchIcons(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'query' => 'required|string|min:1',
        ]);

        $query = $request->input('query');

        // Assuming you have a list of icons, you might fetch them from a database or predefined array
        $icons = icons();

        // Filter icons based on the search query
        $filteredIcons = array_filter($icons, function ($icon) use ($query) {
            return stripos($icon, $query) !== false;
        });

        return response()->json(array_values($filteredIcons));
    } // End Method

    public function SettingEdit($id)
    {
        $title = 'Site Setting';

        $site_setting = Setting::findOrFail($id);

        return view('backend.setting.site_setting', compact('title', 'site_setting'));
    } // End Method

    public function SettingUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'header_logo' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
                'footer_logo' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            ],
            [
                'id.required' => 'ID is required',
                'header_logo.mimes' => 'Header logo must be a jpg, jpeg, png, gif, webp or svg file',
                'footer_logo.mimes' => 'Footer logo must be a jpg, jpeg, png, gif, webp or svg file',
            ],
        );

        if ($validator->fails()) {
            DB::rollBack();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = Setting::findOrFail($request->id);
            if (!$data) {
                abort(404);
            }
            $data->copyright = $request->copyright;
            $data->footer_text = $request->footer_text;
            $data->facebook = $request->facebook;
            $data->youtube = $request->youtube;
            $data->linkedin = $request->linkedin;
            $data->instagram = $request->instagram;

            $data->head_address = $request->head_address;
            $data->branch_address = $request->branch_address;
            $data->site_phone = $request->site_phone;
            $data->site_phone_alter = $request->site_phone_alter;
            $data->site_email = $request->site_email;
            $data->site_email_alter = $request->site_email_alter;

            $data->meta_title = $request->meta_title;
            $data->meta_description = $request->meta_description;

            $destination = base_path('public/uploads/site_setting/');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            if ($request->file('header_logo')) {
                if ($data->header_logo && file_exists(base_path('public/' . $data->header_logo))) {
                    unlink(base_path('public/' . $data->header_logo));
                }

                $header_logo = $request->file('header_logo');
                $extension = strtolower($header_logo->getClientOriginalExtension());
                $name_gen = hexdec(uniqid()) . '.' . $extension;

                if ($extension === 'svg') {
                    // SVG is XML/vector based — Intervention Image (GD driver) can't
                    // read/process it as a raster image, so save it directly instead.
                    $header_logo->move($destination, $name_gen);
                } else {
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($header_logo);
                    // $image->resize(306, 337);
                    $image->save($destination . $name_gen);
                }

                $data->header_logo = 'uploads/site_setting/' . $name_gen;
            }

            if ($request->file('footer_logo')) {
                if ($data->footer_logo && file_exists(base_path('public/' . $data->footer_logo))) {
                    unlink(base_path('public/' . $data->footer_logo));
                }

                $footer_logo = $request->file('footer_logo');
                $extension = strtolower($footer_logo->getClientOriginalExtension());
                $name_gen = hexdec(uniqid()) . '.' . $extension;

                if ($extension === 'svg') {
                    // Same reason as above — bypass Intervention Image for SVG.
                    $footer_logo->move($destination, $name_gen);
                } else {
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($footer_logo);
                    // $image->resize(306, 337);
                    $image->save($destination . $name_gen);
                }

                $data->footer_logo = 'uploads/site_setting/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->back()->with('success', 'Site Setting Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating site setting: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}