<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdmissionNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdmissionNoticeController extends Controller
{
    public function AdmissionNoticeList()
    {
        $title = 'Admission Notice List';

        $admission_notice = AdmissionNotice::orderBy('id', 'desc')->get();

        return view('backend.admission_notice.list', compact('title', 'admission_notice'));
    } // End Method

    public function AdmissionNoticeAdd()
    {
        $title = 'Admission Notice Add';

        return view('backend.admission_notice.add', compact('title'));
    } // End Method

    public function AdmissionNoticeStore(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'text' => 'required|max:255',
                'link' => 'nullable|max:255',
            ],
            [
                'text.required' => 'Notice text is required',
                'text.max' => 'Notice text is too long',
            ],
        );

        if ($validator->fails()) {
            DB::rollBack();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = new AdmissionNotice();
            $data->text = $request->text;
            $data->link = $request->link;
            $data->status = $request->has('status') ? 1 : 0;
            $data->save();

            DB::commit();

            return redirect()->route('admin.admission-notice.list')->with('success', 'Admission Notice Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while creating admission notice: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method

    public function AdmissionNoticeEdit($id)
    {
        $title = 'Admission Notice Edit';

        $admission_notice = AdmissionNotice::findOrFail($id);

        return view('backend.admission_notice.edit', compact('title', 'admission_notice'));
    } // End Method

    public function AdmissionNoticeUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'text' => 'required|max:255',
                'link' => 'nullable|max:255',
            ],
            [
                'id.required' => 'ID is required',
                'text.required' => 'Notice text is required',
                'text.max' => 'Notice text is too long',
            ],
        );

        if ($validator->fails()) {
            DB::rollBack();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = AdmissionNotice::findOrFail($request->id);
            if (!$data) {
                abort(404);
            }
            $data->text = $request->text;
            $data->link = $request->link;
            $data->status = $request->has('status') ? 1 : 0;
            $data->save();

            DB::commit();

            return redirect()->route('admin.admission-notice.list')->with('success', 'Admission Notice Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating admission notice: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method

    public function AdmissionNoticeDelete($id)
    {
        DB::beginTransaction();

        try {
            $data = AdmissionNotice::find($id);
            $data->delete();

            DB::commit();

            return redirect()->route('admin.admission-notice.list')->with('success', 'Admission Notice Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while deleting admission notice: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}
