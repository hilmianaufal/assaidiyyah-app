<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Agenda;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Organization;
use App\Models\Program;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();


        return view('public.home', [
           'teachers' => Teacher::where('status', 'active')
                ->orderBy('sort_order')
                ->take(10)
                ->get(),

            'setting' => $setting,
            
            'featuredNews' => News::with(['category', 'author', 'tags'])
                ->where('status', 'published')
                ->where('is_featured', true)
                ->latest('published_at')
                ->first(),

            'latestNews' => News::with(['category', 'author'])
                ->where('status', 'published')
                ->latest('published_at')
                ->take(6)
                ->get(),


                
            'programs' => Program::where('status', 'published')
                ->orderBy('sort_order')
                ->take(6)
                ->get(),

            'galleries' => Gallery::where('status', 'published')
                ->latest()
                ->take(6)
                ->get(),

            'teachers' => Teacher::where('status', 'active')
                ->orderBy('sort_order')
                ->take(4)
                ->get(),

            'organizations' => Organization::where('status', 'active')
                ->orderBy('sort_order')
                ->take(4)
                ->get(),

            'achievements' => Achievement::where('status', 'published')
                ->latest('achievement_date')
                ->take(3)
                ->get(),

            'testimonials' => Testimonial::where('status', 'published')
                ->latest()
                ->take(3)
                ->get(),

            'agendas' => Agenda::where('status', 'published')
                ->whereDate('event_date', '>=', now())
                ->orderBy('event_date')
                ->take(3)
                ->get(),
               
                
        ]);
    }

    public function about()
    {
        $setting = Setting::first();

        $organizations = Organization::where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        $teachers = Teacher::where('status', 'active')
            ->orderBy('sort_order')
            ->take(8)
            ->get();

        return view('public.about', compact(
            'setting',
            'organizations',
            'teachers'
        ));
    }

    public function gallery()
    {
        $setting = Setting::first();

        $galleries = Gallery::where('status', 'published')
            ->latest()
            ->paginate(12);

        return view('public.gallery', compact('setting', 'galleries'));
    }
    public function contact()
    {
        $setting = Setting::first();

        return view('public.contact', compact('setting'));
    }


    public function programs()
    {
        $setting = Setting::first();

        $programs = Program::where('status', 'published')
            ->orderBy('sort_order')
            ->paginate(9);

        return view('public.programs', compact('setting', 'programs'));
    }

    public function achievements()
    {
        $setting = Setting::first();

        $achievements = Achievement::where('status', 'published')
            ->latest('achievement_date')
            ->paginate(12);

        return view(
            'public.achievements',
            compact(
                'setting',
                'achievements'
            )
        );
    }


}