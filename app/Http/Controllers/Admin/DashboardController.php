<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Agenda;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalNews' => News::count(),
            'totalAnnouncements' => Announcement::count(),
            'totalAgendas' => Agenda::count(),
            'totalGalleries' => Gallery::count(),
            'totalAchievements' => Achievement::count(),
            'totalPrograms' => Program::count(),
            'totalStudents' => Student::count(),
            'totalRegistrations' => Registration::count(),
            'totalTestimonials' => Testimonial::count(),
            'totalTeachers' => Teacher::count(),
            'latestNews' => News::latest()->take(5)->get(),
            'latestAnnouncements' => Announcement::latest()->take(5)->get(),
            'upcomingAgendas' => Agenda::whereDate('event_date', '>=', now())
                ->orderBy('event_date')
                ->take(5)
                ->get(),
        ]);
    }
}