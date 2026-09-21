<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Circular;
use App\Models\Enrollment;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\JobApply;
use App\Models\MediaVideo;
use App\Models\Notice;
use App\Models\Publications;
use App\Models\Scholarship;
use App\Models\Testimonial;
use App\Models\Trainer;
use App\Models\Training;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\Institution;
use App\Models\OurTeam;
use App\Models\Service;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $now = Carbon::now();
        $months = collect(range(5, 0))->map(fn ($i) => $now->copy()->startOfMonth()->subMonths($i));
        $rangeStart = $months->first();

        // ---------- Donations ----------
        $donationBase = Donation::where('status', 'completed');
        $donationStats = [
            'total_raised' => (float) (clone $donationBase)->sum('amount'),
            'this_month' => (float) (clone $donationBase)->where('created_at', '>=', $now->copy()->startOfMonth())->sum('amount'),
            'completed' => (clone $donationBase)->count(),
            'pending' => Donation::where('status', 'pending')->count(),
            'failed' => Donation::whereIn('status', ['failed', 'cancelled'])->count(),
            'donors' => (clone $donationBase)->distinct('donor_phone')->count('donor_phone'),
        ];
        $recentDonations = Donation::with('category')->latest()->take(7)->get();
        $categoryBreakdown = Donation::where('status', 'completed')
            ->selectRaw('donation_category_id, SUM(amount) as raised, COUNT(*) as total')
            ->groupBy('donation_category_id')
            ->orderByDesc('raised')
            ->take(6)
            ->get()
            ->map(function ($row) {
                $cat = $row->donation_category_id ? DonationCategory::find($row->donation_category_id) : null;
                $row->title = $cat->title ?? 'General Donation';
                $row->target = $cat->target_amount ?? null;
                return $row;
            });

        $donationRows = Donation::where('status', 'completed')->where('created_at', '>=', $rangeStart)->get(['amount', 'created_at']);
        $donationTrend = $months->map(fn ($m) => (float) $donationRows->filter(fn ($d) => $d->created_at->format('Y-m') === $m->format('Y-m'))->sum('amount'))->values();

        // ---------- Enrollments ----------
        $enrollStats = [
            'total' => Enrollment::count(),
            'pending' => Enrollment::where('status', 'pending')->count(),
            'paid' => Enrollment::where('status', 'paid')->count(),
            'failed' => Enrollment::whereIn('status', ['failed', 'cancelled'])->count(),
            'revenue' => (float) Enrollment::where('status', 'paid')->sum('amount'),
        ];
        $recentEnrollments = Enrollment::with('training')->latest()->take(7)->get();
        $enrollRows = Enrollment::where('created_at', '>=', $rangeStart)->get(['status', 'created_at']);
        $enrollTrend = $months->map(fn ($m) => $enrollRows->filter(fn ($e) => $e->created_at->format('Y-m') === $m->format('Y-m'))->count())->values();
        $enrollPaidTrend = $months->map(fn ($m) => $enrollRows->filter(fn ($e) => $e->status === 'paid' && $e->created_at->format('Y-m') === $m->format('Y-m'))->count())->values();
        $chartMonths = $months->map(fn ($m) => $m->format('M Y'))->values();

        // ---------- Careers / Job applications ----------
        $jobStats = [
            'total' => JobApply::count(),
            'pending' => JobApply::where('status', 'pending')->count(),
            'shortlisted' => JobApply::where('status', 'shortlisted')->count(),
            'hired' => JobApply::where('status', 'hired')->count(),
            'rejected' => JobApply::where('status', 'rejected')->count(),
            'open_jobs' => Career::where('status', 'active')->count(),
        ];
        $recentApplications = JobApply::with('career')->latest()->take(6)->get();
        $closingCareers = Career::where('status', 'active')->whereNotNull('deadline')
            ->whereDate('deadline', '>=', $now->toDateString())->orderBy('deadline')->take(4)->get();

        // ---------- Contacts ----------
        $contactStats = [
            'total' => Contact::count(),
            'week' => Contact::where('created_at', '>=', $now->copy()->subDays(7))->count(),
            'today' => Contact::whereDate('created_at', $now->toDateString())->count(),
        ];
        $recentContacts = Contact::latest()->take(5)->get();

        // ---------- Content overview ----------
        $content = [
            ['Programs', Training::count(), 'admin.training.list', 'fa-graduation-cap'],
            ['Trainers', Trainer::count(), 'admin.trainer.list', 'fa-chalkboard-teacher'],
            ['Services', Service::where('status', 'active')->count(), 'admin.service.list', 'fa-concierge-bell'],
            ['Institutions', Institution::where('status', 'active')->count(), 'admin.institution.list', 'fa-building'],
            ['Blogs', Blog::where('status', 'active')->count(), 'admin.blog.list', 'fa-newspaper'],
            ['Notices', Notice::count(), 'admin.notice.list', 'fa-bullhorn'],
            ['Publications', Publications::count(), 'admin.publications.list', 'fa-book'],
            ['Circulars', Circular::count(), 'admin.circular.list', 'fa-file-alt'],
            ['Gallery', Gallery::count(), 'admin.gallery.list', 'fa-images'],
            ['Videos', MediaVideo::count(), 'admin.media_video.list', 'fa-video'],
            ['Facilities', Facility::count(), 'admin.facility.list', 'fa-hospital'],
            ['Scholarships', Scholarship::count(), 'admin.scholarship.list', 'fa-award'],
            ['Testimonials', Testimonial::count(), 'admin.testimonial.list', 'fa-comment-dots'],
            ['Team', OurTeam::count(), 'admin.our-team.list', 'fa-users'],
        ];

        return view('backend.admin.index', compact(
            'donationStats', 'recentDonations', 'categoryBreakdown', 'donationTrend',
            'enrollStats', 'recentEnrollments', 'enrollTrend', 'enrollPaidTrend', 'chartMonths',
            'jobStats', 'recentApplications', 'closingCareers',
            'contactStats', 'recentContacts', 'content'
        ));
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    } // End Method

    public function AdminProfile()
    {
        $title = 'Admin Profile';
        $admin_profile = Auth::user(); // Assuming the logged-in user is the admin
        return view('backend.admin.profile', compact('title', 'admin_profile'));
    } // End Method

    public function AdminProfileUpdate(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'name' => 'required|max:100',
                'email' => 'required|max:100',
                'thumbnail' => 'image|max:1024',
            ],
            [
                'id.required' => 'ID is required',
                'name.required' => 'Name is required',
                'name.max' => 'Name is too long',
                'email.required' => 'Email is required',
                'email.max' => 'Email is too long',
                'thumbnail.image' => 'Thumbnail must be an image',
                'thumbnail.max' => 'Thumbnail must be less than 1MB',
            ],
        );

        try {
            $data = User::findOrFail($request->id);
            if (!$data) {
                abort(404);
            }
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;

            if ($request->file('thumbnail')) {
                if (file_exists(base_path('public/' . $data->thumbnail))) {
                    unlink(base_path('public/' . $data->thumbnail));
                }
                $thumbnail = $request->file('thumbnail');
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
                $image = $manager->read($thumbnail);
                // $image->resize(1600, 700);
                $image->toJpeg(80)->save(base_path('public/uploads/admin_profile/' . $name_gen));
                $data->thumbnail = 'uploads/admin_profile/' . $name_gen;
            }

            $data->save();

            DB::commit();

            return redirect()->route('admin.profile')->with('success', 'Admin Profile Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error occurred while updating admin profile: ' . $e->getMessage());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
            }
        }
    } // End Method

    public function AdminPasswordUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
                'old_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ],
            [
                'id.required' => 'ID is required',
                'old_password.required' => 'Current Password is required',
                'new_password.required' => 'New Password is required',
                'new_password.min' => 'New Password must be at least 8 characters',
                'new_password.confirmed' => 'New Password confirmation does not match',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::findOrFail($request->id);
            if (!$user || !Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('error', 'Current Password does not match');
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('admin.profile')->with('success', 'Password Updated Successfully');
        } catch (\Exception $e) {
            Log::error('Error occurred while updating password: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    } // End Method
}