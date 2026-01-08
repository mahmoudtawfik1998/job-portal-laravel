<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;

class JobController extends Controller
{
public function dashboard()
{
    $totalJobs = Job::count();
    $publishedJobs = Job::where('status', 1)->count();
    $hiddenJobs = Job::where('status', 0)->count();
    $totalApplications = Application::count();
    $latestJob = Job::latest()->first();
    $latestJobs = Job::latest()->take(5)->get();
    $latestApplications = Application::latest()->take(6)->get();

    return view('admin.dashboard', compact(
        'totalJobs', 'publishedJobs', 'hiddenJobs', 'totalApplications', 
        'latestJob', 'latestJobs', 'latestApplications'
    ));
}
    // عرض كل الوظائف للـ Admin
    public function index()
    {
        $jobs = Job::latest()->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        Job::create($request->all());
        return redirect()->route('admin.jobs.index')->with('success','Job added successfully');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->route('admin.jobs.index')->with('success','Job updated successfully');
    }

    public function destroy($id)
    {
        Job::findOrFail($id)->delete();
        return redirect()->route('admin.jobs.index')->with('success','Job deleted successfully');
    }

    // عرض المتقدمين لوظيفة معينة
    public function show($id)
    {
        $job = Job::findOrFail($id);
        $applications = $job->applications;
        return view('admin.applications.show', compact('job','applications'));
    }
}
