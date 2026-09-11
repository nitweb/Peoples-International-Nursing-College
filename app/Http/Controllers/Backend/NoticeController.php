<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
{
    public function NoticeList()
    {
        $title = 'Notice List';

        $notice = Notice::orderBy('id', 'desc')->get();

        return view('backend.notice.list', compact('title', 'notice'));
    } // End Method

    public function NoticeAdd()
    {
        $title = 'Notice Add';

        return view('backend.notice.add', compact('title'));
    } // End Method

    public function NoticeStore(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'files' => 'required',
                'files.*' => 'file|mimes:pdf,doc,docx|max:2048',
            ],
            [
                'title.required' => 'Title is required',
                'title.max' => 'Title is too long',
                'files.required' => 'Files are required',
                'files.*.file' => 'Each file must be a file',
                'files.*.mimes' => 'Each file must be a PDF, DOC, or DOCX',
                'files.*.max' => 'Each file must be less than 2MB',
            ],
        );

        try {
            $data = new Notice();
            $data->title = $request->title;

            if ($request->file('files')) {
                $file_input = $request->file('files');
                $name_gen = uniqid() . '.' . $file_input->getClientOriginalExtension();
                $file_input->move(public_path('uploads/notice'), $name_gen);
                $data->files = 'uploads/notice/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->route('admin.notice.list')->with('success', 'Notice Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while creating notice: ' . $e->getMessage());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        }
    } // End Method

    public function NoticeEdit($id)
    {
        $title = 'Notice Edit';

        $notice = Notice::findOrFail($id);

        return view('backend.notice.edit', compact('title', 'notice'));
    } // End Method

    public function NoticeUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'title' => 'max:255',
                'files.*' => 'file|mimes:pdf,doc,docx|max:2048',
            ],
            [
                'id.required' => 'ID is required',
                'title.max' => 'Title is too long',
                'files.*.file' => 'Each file must be a file',
                'files.*.mimes' => 'Each file must be a PDF, DOC, or DOCX',
                'files.*.max' => 'Each file must be less than 2MB',
            ],
        );

        try {
            $data = Notice::findOrFail($request->id);
            if (!$data) {
                abort(404);
            }
            $data->title = $request->title;

            if ($request->hasFile('files')) {
                $filePath = base_path('public/' . $data->files);
                if (!empty($data->files) && file_exists($filePath)) {
                    unlink($filePath);
                }
                $file_input = $request->file('files');
                $name_gen = uniqid() . '.' . $file_input->getClientOriginalExtension();
                $file_input->move(public_path('uploads/notice'), $name_gen);
                $data->files = 'uploads/notice/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->route('admin.notice.list')->with('success', 'Notice Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating notice: ' . $e->getMessage());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        }
    } // End Method

    public function NoticeDelete($id)
    {
        DB::beginTransaction();

        try {
            $data = Notice::find($id);

            if (file_exists(base_path('public/' . $data->files))) {
                unlink(base_path('public/' . $data->files));
            }
            $data->delete();

            DB::commit();

            return redirect()->route('admin.notice.list')->with('success', 'Notice Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while deleting notice: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}
