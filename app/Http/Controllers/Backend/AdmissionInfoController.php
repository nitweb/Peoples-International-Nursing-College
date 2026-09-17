<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdmissionInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdmissionInfoController extends Controller
{
    // Singleton content: always edit row #1, auto-create if missing so no manual seeding is needed.
    public function AdmissionInfoEdit()
    {
        $title = 'Admission Information';

        $admission_info = AdmissionInfo::firstOrCreate(['id' => 1]);

        return view('backend.admission_info.edit', compact('title', 'admission_info'));
    } // End Method

    public function AdmissionInfoUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make($request->all(), [
            'long_description'     => 'nullable|string',
            'eligibility_notes'    => 'nullable|string',
            'required_documents'   => 'nullable|string',
            'key_dates'            => 'nullable|string',
            'prospectus_file'      => 'nullable|file|mimes:pdf|max:5120',
            'admission_form_file'  => 'nullable|file|mimes:pdf|max:5120',
        ]);

        try {
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = AdmissionInfo::firstOrCreate(['id' => 1]);

            $data->long_description   = $request->long_description;
            $data->eligibility_notes  = $request->eligibility_notes;
            $data->required_documents = $request->required_documents;
            $data->key_dates          = $request->key_dates;

            if ($request->file('prospectus_file')) {
                if ($data->prospectus_file && file_exists(public_path($data->prospectus_file))) {
                    unlink(public_path($data->prospectus_file));
                }
                $pdf      = $request->file('prospectus_file');
                $name_gen = hexdec(uniqid()) . '.' . $pdf->getClientOriginalExtension();
                $pdf->move(base_path('public/uploads/admission'), $name_gen);
                $data->prospectus_file = 'uploads/admission/' . $name_gen;
            }

            if ($request->file('admission_form_file')) {
                if ($data->admission_form_file && file_exists(public_path($data->admission_form_file))) {
                    unlink(public_path($data->admission_form_file));
                }
                $pdf      = $request->file('admission_form_file');
                $name_gen = hexdec(uniqid()) . '.' . $pdf->getClientOriginalExtension();
                $pdf->move(base_path('public/uploads/admission'), $name_gen);
                $data->admission_form_file = 'uploads/admission/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->back()->with('success', 'Admission Information Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating Admission Information: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!')->withInput();
        }
    } // End Method
}
