<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class TrainingEnrollmentController extends Controller
{
    public function EnrollPage($slug)
    {
        $training = Training::where('slug', $slug)->where('status', 'active')->firstOrFail();

        return view('frontend.pages.enroll', compact('training'));
    }

    // Form submit
    public function EnrollSubmit(Request $request)
    {
        $request->validate([
            'training_id' => 'required|integer|exists:trainings,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            'name' => 'required|string|max:120',
            'father_name' => 'required|string|max:150',
            'mother_name' => 'nullable|string|max:150',
            'age' => 'nullable|integer|min:0|max:100',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:150',
            'nationality' => 'nullable|string|max:100',
            'religion' => 'nullable|string|max:100',
            'permanent_address' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:120',
            'phone' => 'required|string|max:30',
            'father_mother_mobile' => 'required|string|max:30',

            'guardian_name' => 'nullable|string|max:150',
            'guardian_mobile' => 'nullable|string|max:30',
            'guardian_address' => 'nullable|string|max:255',
            'guardian_relation' => 'nullable|string|max:100',
            'guardian_occupation' => 'nullable|string|max:150',
            'guardian_tel' => 'nullable|string|max:30',
            'blood_group' => 'nullable|string|max:5',

            'ssc_group' => 'nullable|string|max:100',
            'ssc_gpa' => 'nullable|string|max:20',
            'ssc_year' => 'nullable|string|max:10',
            'ssc_institute' => 'nullable|string|max:191',
            'ssc_board' => 'nullable|string|max:100',

            'hsc_group' => 'nullable|string|max:100',
            'hsc_gpa' => 'nullable|string|max:20',
            'hsc_year' => 'nullable|string|max:10',
            'hsc_institute' => 'nullable|string|max:191',
            'hsc_board' => 'nullable|string|max:100',

            'diploma_group' => 'nullable|string|max:100',
            'diploma_gpa' => 'nullable|string|max:20',
            'diploma_year' => 'nullable|string|max:10',
            'diploma_institute' => 'nullable|string|max:191',
            'diploma_board' => 'nullable|string|max:100',

            'admit_roll' => 'required|string|max:50',
            'test_score' => 'nullable|string|max:30',
            'merit_position' => 'nullable|string|max:30',

            'ssc_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'ssc_marksheet' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'hsc_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'hsc_marksheet' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'admission_test_admit_card' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'diploma_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'diploma_registration_card' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'nid_or_birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'bkash_trx_id' => 'nullable|string|max:100',
            'bkash_trx_ref' => 'nullable|string|max:100',

            'note' => 'nullable|string|max:500',

            'declaration_accepted' => 'required|accepted',
            'applicant_name' => 'required|string|max:150',
            'applicant_address' => 'required|string|max:255',
            'applicant_date' => 'nullable|date',
        ]);

        DB::beginTransaction();
        try {
            $training = Training::findOrFail($request->training_id);

            $invoice = 'ADM-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(5));

            $uploadPath = 'uploads/admissions/';
            if (!is_dir(base_path('public/' . $uploadPath))) {
                mkdir(base_path('public/' . $uploadPath), 0755, true);
            }

            $storeFile = function ($field) use ($request, $uploadPath) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $name = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('public/' . $uploadPath), $name);
                    return $uploadPath . $name;
                }
                return null;
            };

            $enrollment = Enrollment::create([
                'training_id' => $training->id,
                'invoice' => $invoice,
                'photo' => $storeFile('photo'),

                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'age' => $request->age,
                'date_of_birth' => $request->date_of_birth,
                'place_of_birth' => $request->place_of_birth,
                'nationality' => $request->nationality,
                'religion' => $request->religion,
                'permanent_address' => $request->permanent_address,
                'present_address' => $request->present_address,
                'address' => $request->present_address,
                'email' => $request->email,
                'phone' => $request->phone,
                'father_mother_mobile' => $request->father_mother_mobile,

                'guardian_name' => $request->guardian_name,
                'guardian_mobile' => $request->guardian_mobile,
                'guardian_address' => $request->guardian_address,
                'guardian_relation' => $request->guardian_relation,
                'guardian_occupation' => $request->guardian_occupation,
                'guardian_tel' => $request->guardian_tel,
                'blood_group' => $request->blood_group,

                'ssc_group' => $request->ssc_group,
                'ssc_gpa' => $request->ssc_gpa,
                'ssc_year' => $request->ssc_year,
                'ssc_institute' => $request->ssc_institute,
                'ssc_board' => $request->ssc_board,

                'hsc_group' => $request->hsc_group,
                'hsc_gpa' => $request->hsc_gpa,
                'hsc_year' => $request->hsc_year,
                'hsc_institute' => $request->hsc_institute,
                'hsc_board' => $request->hsc_board,

                'diploma_group' => $request->diploma_group,
                'diploma_gpa' => $request->diploma_gpa,
                'diploma_year' => $request->diploma_year,
                'diploma_institute' => $request->diploma_institute,
                'diploma_board' => $request->diploma_board,

                'admit_roll' => $request->admit_roll,
                'test_score' => $request->test_score,
                'merit_position' => $request->merit_position,

                'ssc_certificate' => $storeFile('ssc_certificate'),
                'ssc_marksheet' => $storeFile('ssc_marksheet'),
                'hsc_certificate' => $storeFile('hsc_certificate'),
                'hsc_marksheet' => $storeFile('hsc_marksheet'),
                'admission_test_admit_card' => $storeFile('admission_test_admit_card'),
                'diploma_certificate' => $storeFile('diploma_certificate'),
                'diploma_registration_card' => $storeFile('diploma_registration_card'),
                'nid_or_birth_certificate' => $storeFile('nid_or_birth_certificate'),

                'bkash_trx_id' => $request->bkash_trx_id,
                'bkash_trx_ref' => $request->bkash_trx_ref,

                'note' => $request->note,

                'declaration_accepted' => true,
                'applicant_name' => $request->applicant_name,
                'applicant_address' => $request->applicant_address,
                'applicant_date' => $request->applicant_date,

                'amount' => $training->registration_fee ?? 0,
                'status' => 'pending',
            ]);

            DB::commit();

            return redirect()->route('frontend.training.enroll.success', $enrollment->invoice);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Admission Enrollment Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Please try again.')->withInput();
        }
    }

    // Success page
    public function EnrollSuccess($invoice)
    {
        $enrollment = Enrollment::with('training')->where('invoice', $invoice)->firstOrFail();

        return view('frontend.pages.enroll_success', compact('enrollment'));
    }

    // ── Backend List ──
    public function index()
    {
        $title = 'Admission Application List';

        $enrollment_info = Enrollment::with(['training'])
            ->orderBy('id', 'asc')
            ->get();

        return view('backend.training_enrollment.list', compact('title', 'enrollment_info'));
    }

    // ── Backend Show ──
    public function show(Enrollment $enrollment)
    {
        $title = 'Admission Application Details';
        $enrollment->load('training');
        return view('backend.training_enrollment.show', compact('title', 'enrollment'));
    }

    // ── Delete ──
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('admin.training.enrollment.list')->with('success', 'Application deleted successfully.');
    }

    // ── AJAX Status Update ── (paid = Approved, failed = Rejected — kept as-is for DB/dashboard compatibility)
    public function updateStatus(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,failed,cancelled',
        ]);

        $enrollment->update(['status' => $request->status]);

        $badge = match ($enrollment->status) {
            'paid' => 'success',
            'pending' => 'info',
            'failed' => 'danger',
            'cancelled' => 'secondary',
            default => 'dark',
        };

        $labels = [
            'paid' => 'Approved',
            'failed' => 'Rejected',
            'pending' => 'Pending',
            'cancelled' => 'Cancelled',
        ];

        return response()->json([
            'success' => true,
            'status' => $enrollment->status,
            'label' => $labels[$enrollment->status] ?? ucfirst($enrollment->status),
            'badge' => $badge,
        ]);
    }

    public function downloadInvoice($invoice)
    {
        $enrollment = Enrollment::with('training')->where('invoice', $invoice)->firstOrFail();

        $pdf = Pdf::loadView('frontend.pdf.enrollment_invoice', compact('enrollment'))->setPaper('a4', 'portrait');

        return $pdf->download($enrollment->invoice . '.pdf');
    }
}
