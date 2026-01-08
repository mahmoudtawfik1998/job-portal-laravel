<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Application;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // الإحصائيات
        $totalJobs = Job::count();
        $publishedJobs = Job::where('status', 1)->count();
        $hiddenJobs = Job::where('status', 0)->count();
        $totalApplications = Application::count();

        // آخر 5 وظائف
        $latestJobs = Job::latest()->take(5)->get();

        // آخر 5 متقدمين
        $latestApplications = Application::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalJobs',
            'publishedJobs',
            'hiddenJobs',
            'totalApplications',
            'latestJobs',
            'latestApplications'
        ));
    }
}
