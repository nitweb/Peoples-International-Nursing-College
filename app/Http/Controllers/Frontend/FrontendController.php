<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Circular;
use App\Models\Client;
use App\Models\Enlistment;
use App\Models\Finance;
use App\Models\Gallery;
use App\Models\Institution;
use App\Models\MediaVideo;
use App\Models\Notice;
use App\Models\OurContents;
use App\Models\OurTeam;
use App\Models\Publications;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SuccessfulPortfolios;
use App\Models\Testimonial;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\User;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Index()
    {
        $slider = Slider::where('status', 'active')->orderBy('id', 'desc')->get();

        $about_us = AboutUs::where('id', 1)->latest()->get()->firstOrFail();

        $services = Service::where('status', 'active')->orderBy('id', 'asc')->take(6)->get();

        $blog = Blog::where('status', 'active')->latest()->take(3)->get();

        $our_team = OurTeam::where('status', 'active')->orderBy('id', 'asc')->get();

        $top_level_team = $our_team
            ->filter(function ($item) {
                return $item->type == 'top_level';
            })
            ->sortByDesc('id');

        $client = Client::where('status', 'active')->orderBy('id', 'desc')->get();

        $institutions = Institution::where('status', 'active')->orderBy('serial', 'asc')->orderBy('id', 'asc')->get();

        $testimonials = Testimonial::where('status', 'active')->orderBy('id', 'desc')->get();

        $media_videos = MediaVideo::where('status', 'active')->orderBy('published_at', 'desc')->take(6)->get();

        $training_list = Training::where('status', 'active')->where('category', 'academic_program')->latest()->take(3)->get();
        if ($training_list->isEmpty()) {
            // Fallback so the homepage section isn't empty before any academic program is added
            $training_list = Training::where('status', 'active')->latest()->take(3)->get();
        }

        $notices = Notice::latest()->take(5)->get();

        return view('frontend.index', compact('slider', 'about_us', 'services', 'our_team', 'top_level_team', 'client', 'institutions', 'blog', 'testimonials', 'media_videos', 'training_list', 'notices'));
    } // End Method

    public function Media()
    {
        $media_videos = MediaVideo::where('status', 'active')->orderBy('published_at', 'desc')->paginate(12);

        return view('frontend.pages.media', compact('media_videos'));
    } // End Method

    public function MediaVideoView($id)
    {
        $video = MediaVideo::find($id);

        if ($video) {
            $video->incrementViews();
        }

        return response()->json(['success' => true, 'views' => $video ? $video->views_label : null]);
    } // End Method

    public function ServiceDetails($slug)
    {
        $service_list = Service::where('status', 'active')->orderBy('id', 'asc')->get();
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('frontend.details.service_details', compact('service_list', 'service'));
    } // End Method

    public function AllServiceList()
    {
        $services = Service::where('status', 'active')->orderBy('id', 'asc')->get();
        return view('frontend.pages.services', compact('services'));
    } // End Method

    public function AboutUs()
    {
        $about_us = AboutUs::where('id', 1)->latest()->get()->firstOrFail();

        return view('frontend.pages.about', compact('about_us'));
    } // End Method

    public function MissionVisionValues()
    {
        $mission = OurContents::where('id', 1)->latest()->get()->firstOrFail();
        $vision = OurContents::where('id', 2)->latest()->get()->firstOrFail();
        $values = OurContents::where('id', 3)->latest()->get()->firstOrFail();

        return view('frontend.pages.mission_vision_values', compact('mission', 'vision', 'values'));
    } // End Method

    public function ExecutiveDirectorMessage()
    {
        $about_message = AboutUs::where('id', 2)->latest()->get()->firstOrFail();

        return view('frontend.pages.executive_director_message', compact('about_message'));
    } // End Method

    public function ExecutiveCommittee()
    {
        $executive_committee = OurTeam::where('status', 'active')
            ->where('type', 'founder')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.pages.executive_committee', compact('executive_committee'));
    } // End Method

    public function OurLeadership()
    {
        $leadership = OurTeam::where('status', 'active')
            ->where('type', 'top_level')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.pages.our_leadership', compact('leadership'));
    } // End Method

    public function OurPartners()
    {
        $partners = OurTeam::where('status', 'active')
            ->where('type', 'middle_level')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.pages.our_partners', compact('partners'));
    } // End Method

    public function MeetOurTeam()
    {
        $team = OurTeam::where('status', 'active')
            ->where('type', 'student_level')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.pages.meet_our_team', compact('team'));
    } // End Method

    public function ImportantEnlistment()
    {
        $enlistment = Enlistment::latest()->get()->firstOrFail();
        return view('frontend.pages.important_enlistment', compact('enlistment'));
    } // End Method

    public function Client()
    {
        $client = Client::where('status', 'active')->latest()->get();
        return view('frontend.pages.client', compact('client'));
    } // End Method

    public function Gallery()
    {
        $gallery = Gallery::where('status', 'active')->latest()->get();
        return view('frontend.pages.gallery', compact('gallery'));
    } // End Method

    public function GalleryDetails($slug)
    {
        $gallery = Gallery::findOrfail($slug);

        return view('frontend.details.gallery_details', compact('gallery'));
    } // End Method

    public function ContactUs()
    {
        $site_setting = Setting::firstOrFail();
        $services = Service::where('status', 'active')->latest()->get();
        return view('frontend.pages.contact', compact('site_setting', 'services'));
    } // End Method

    public function Faq()
    {
        // Static FAQ content — no dedicated backend model for this yet.
        $faqs = [
            [
                'category' => 'Admission',
                'items' => [
                    ['q' => 'What are the eligibility requirements for admission?', 'a' => 'Applicants must meet the minimum academic qualification set for each program (please check the specific course page for details) and complete the online or in-person application process before the registration deadline.'],
                    ['q' => 'How do I apply for a program?', 'a' => 'Browse our Academy page, select a program, and click "Enroll Now" to fill out the enrollment form. You can pay the registration fee via bKash directly from the form.'],
                    ['q' => 'Is there an entrance exam?', 'a' => 'This depends on the specific program. Please check the individual program details page or contact our admissions office for the latest requirements.'],
                ],
            ],
            [
                'category' => 'Fees & Payment',
                'items' => [
                    ['q' => 'What payment methods are accepted?', 'a' => 'We currently accept payments via bKash for training enrollments and donations. Bank transfer options may be available on request — please contact our office.'],
                    ['q' => 'Are scholarships available?', 'a' => 'Yes, merit-based scholarships and financial assistance are available for eligible students. Contact our admissions office for details on how to apply.'],
                    ['q' => 'Can I get a refund if I cancel my enrollment?', 'a' => 'Refund policies vary by program. Please contact our office directly with your invoice number to discuss your specific situation.'],
                ],
            ],
            [
                'category' => 'Academic & Campus Life',
                'items' => [
                    ['q' => 'Do you provide hostel or accommodation facilities?', 'a' => 'Please contact our admissions office directly for current information on accommodation options near the campus.'],
                    ['q' => 'What is the duration of the Diploma in Nursing program?', 'a' => 'Program duration varies — please check the specific program page under our Academy section for exact details on duration and class schedule.'],
                    ['q' => 'Do students get hands-on clinical training?', 'a' => 'Yes, our programs combine classroom instruction with hospital-based clinical training to ensure practical, real-world skills.'],
                ],
            ],
            [
                'category' => 'Careers',
                'items' => [
                    ['q' => 'How can I apply for a job opening?', 'a' => 'Visit our Career page to browse current openings. Click "View Details & Apply" on any listing to submit your application online with your CV.'],
                    ['q' => 'Does the college help with job placement after graduation?', 'a' => 'We maintain relationships with partner hospitals and institutions and support graduates in connecting with employment opportunities where possible.'],
                ],
            ],
        ];

        return view('frontend.pages.faq', compact('faqs'));
    } // End Method

    public function BlogList()
    {
        $blog = Blog::where('status', 'active')->latest()->paginate(9);
        return view('frontend.pages.blog', compact('blog'));
    }

    public function BlogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $author = User::where('id', $blog->created_by)->firstOrFail()->name;
        $recent_blogs = Blog::where('status', 'active')->latest()->take(5)->get();

        return view('frontend.details.blog_details', compact('blog', 'author', 'recent_blogs'));
    } // End Method

    public function BlogSearch(Request $request)
    {
        $query = $request->get('q', '');

        $blogs = Blog::where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")->orWhereHas('blogDetail', function ($q) use ($query) {
                    $q->where('long_description', 'like', "%{$query}%");
                });
            })
            ->with('blogDetail.category')
            ->latest()
            ->take(8)
            ->get()
            ->map(function ($blog) {
                return [
                    'title' => $blog->title,
                    'slug' => $blog->slug,
                    'image' => asset($blog->blogDetail->blog_image),
                    'category' => $blog->blogDetail->category->name ?? 'Uncategorized',
                    'date' => \Carbon\Carbon::parse($blog->date)->format('F j, Y'),
                    'url' => route('frontend.blog.details', $blog->slug),
                ];
            });

        return response()->json($blogs);
    }

    public function PrivacyPolicy()
    {
        return view('frontend.pages.privacy_policy');
    } // End Method

    public function TermsConditions()
    {
        return view('frontend.pages.terms_conditions');
    } // End Method

    public function TeamList()
    {
        $team = OurTeam::where('status', 'active')->orderBy('id', 'desc')->get();

        $executive_committee = $team->filter(function ($item) {
            return $item->type == 'founder';
        });

        $leadership = $team->filter(function ($item) {
            return $item->type == 'top_level';
        });

        $partners = $team->filter(function ($item) {
            return $item->type == 'middle_level';
        });

        $team = $team->filter(function ($item) {
            return $item->type == 'student_level';
        });

        return view('frontend.pages.team', compact('team', 'executive_committee', 'leadership', 'partners', 'team'));
    } // End Method

    public function TeamDetails($slug)
    {
        $team = OurTeam::where('slug', $slug)->firstOrFail();
        return view('frontend.details.team_details', compact('team'));
    } // End Method

    public function Career()
    {
        $career = Career::where('status', 'active')->latest()->get();
        return view('frontend.pages.career', compact('career'));
    } // End Method

    public function CareerDetails($slug)
    {
        $job_application = Career::where('slug', $slug)->firstOrFail();
        return view('frontend.details.job_details', compact('job_application'));
    } // End Method

    public function CareerDetailsApply($id)
    {
        $career_apply = Career::findOrFail($id);
        return view('frontend.pages.apply_for_career_by_id', compact('career_apply'));
    }

    public function CareerApply()
    {
        $career = Career::where('status', 'active')->latest()->get();
        return view('frontend.pages.apply_for_career', compact('career'));
    } // End Method

    public function showProfile()
    {
        $successful_portfolios = SuccessfulPortfolios::firstOrFail();
        // dd($successful_portfolios);
        return view('frontend.pages.profile', compact('successful_portfolios'));
    }

    public function Publications()
    {
        $publications_data = Publications::latest()->get();
        return view('frontend.pages.publications', compact('publications_data'));
    } // End Method

    public function NoticeCircular()
    {
        $circular_data = Circular::latest()->get();
        return view('frontend.pages.circular', compact('circular_data'));
    } // End Method

    public function NoticeList()
    {
        $notice = Notice::latest()->get();
        return view('frontend.pages.notice', compact('notice'));
    } // End Method

    public function RemoteSupport()
    {
        $finance_info = Finance::firstOrFail();
        return view('frontend.pages.remote_support', compact('finance_info'));
    } // End Method

    public function TrainingDevelopment()
    {
        $academic_programs = Training::where('status', 'active')->where('category', 'academic_program')->latest()->get();
        $training_list = Training::where('status', 'active')->where('category', 'short_course')->latest()->paginate(9);
        return view('frontend.pages.training_development', compact('academic_programs', 'training_list'));
    } // End Method

    public function TrainingDevelopmentDetails($slug)
    {
        $training_details = Training::with('trainers')->where('slug', $slug)->firstOrFail();
        return view('frontend.details.training_details', compact('training_details'));
    }

    public function trainerDetails($slug)
    {
        $trainer = Trainer::where('slug', $slug)->where('status', 'active')->firstOrFail();

        $trainings = $trainer->trainings()->where('status', 'active')->get();

        return view('frontend.details.trainer_details', compact('trainer', 'trainings'));
    }

    public function EnrollPage()
    {
        return view('frontend.pages.enroll');
    }

    public function Testimonials()
    {
        $testimonials = Testimonial::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('frontend.pages.testimonials', compact('testimonials'));
    } // End Method
}
