<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class JobApplyController extends Controller
{
    public function JobApplyList()
    {
        $title = 'Job Application List';

        $job_applications = JobApply::with('career')->latest()->get();

        return view('backend.job_application.list', compact('title', 'job_applications'));
    } // End Method

    public function JobApplyStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'career_id' => 'nullable|integer|exists:careers,id',
                'name' => 'required|max:100',
                'email' => 'nullable|email|max:100',
                'phone' => 'required|max:20',
                'nid_number' => 'required|string|max:30',
                'date_of_birth' => 'required|date',
                'gender' => 'required|in:male,female,other',
                'address' => 'required|string|max:255',
                'district' => 'required|string|max:100',
                'thana' => 'required|string|max:100',
                'education' => 'required|string|max:150',
                'has_field_experience' => 'nullable|boolean',
                'interested_in' => 'required|string|max:150',
                'message' => 'nullable|string',
                'job_files' => 'required|file|mimes:pdf|max:2048',
            ],
            [
                'name.required' => 'Name is required',
                'phone.required' => 'Phone number is required',
                'nid_number.required' => 'NID number is required',
                'date_of_birth.required' => 'Date of birth is required',
                'gender.required' => 'Please select a gender',
                'address.required' => 'Address is required',
                'district.required' => 'Please select a district',
                'thana.required' => 'Please select a thana/upazila',
                'education.required' => 'Highest education level is required',
                'interested_in.required' => 'Please select the position you are applying for',
                'job_files.required' => 'Please upload your CV',
                'job_files.mimes' => 'CV must be a PDF file',
                'job_files.max' => 'CV file size must be under 2MB',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('open_apply_modal', true);
        }

        DB::beginTransaction();

        try {
            $data = new JobApply();
            $data->career_id = $request->career_id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->nid_number = $request->nid_number;
            $data->date_of_birth = $request->date_of_birth;
            $data->gender = $request->gender;
            $data->address = $request->address;
            $data->district = $request->district;
            $data->thana = $request->thana;
            $data->education = $request->education;
            $data->has_field_experience = $request->boolean('has_field_experience');
            $data->interested_in = $request->interested_in;
            $data->message = $request->message;
            $data->status = 'pending';

            if ($request->hasFile('job_files')) {
                $job_files = $request->file('job_files');
                $name_gen = hexdec(uniqid()) . '.pdf';
                $job_files->move(base_path('public/uploads/job_application/pdf/'), $name_gen);
                $data->job_files = 'uploads/job_application/pdf/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->back()->with('success', 'Your application has been submitted successfully. We will contact you if you are shortlisted.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while creating job application: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong! Please try again.')->withInput();
        }
    } // End Method

    public function JobApplyDelete($id)
    {
        DB::beginTransaction();

        try {
            $data = JobApply::findOrFail($id);
            if ($data->job_files) {
                if (file_exists(base_path('public/' . $data->job_files))) {
                    unlink(base_path('public/' . $data->job_files));
                }
            }
            $data->delete();

            DB::commit();

            return redirect()->route('admin.job_apply.list')->with('success', 'Job Application Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while deleting job application: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method

    public function JobApplyStatusUpdate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,shortlisted,rejected,hired',
        ]);

        $data = JobApply::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Application status updated successfully.');
    } // End Method

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        if (!empty($ids)) {
            $job_applications = JobApply::whereIn('id', $ids)->get();
            foreach ($job_applications as $job_application) {
                if ($job_application->job_files) {
                    if (file_exists(base_path('public/' . $job_application->job_files))) {
                        unlink(base_path('public/' . $job_application->job_files));
                    }
                }
            }
            JobApply::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected job applications have been deleted successfully');
        }
        return redirect()->back()->with('error', 'No job applications selected for deletion');
    }
}
