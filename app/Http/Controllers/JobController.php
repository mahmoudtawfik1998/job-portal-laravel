<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Category;
class JobController extends Controller
{
public function index()
{
    $categories = Category::all();
    // كل الوظائف مع آخر تحديث، 5 لكل صفحة
    $jobs = Job::latest()->paginate(5);

    // جلب الكاتيجوريز مع عدد الوظائف لكل واحدة
    $categories = Category::withCount('jobs')->get();

    return view('jobs.index', compact('jobs', 'categories'));
}
public function home()
{
    $categories = \App\Models\Category::withCount('jobs')->get();

    $featuredJobs = Job::latest()->take(6)->get();
    $fullTimeJobs = Job::where('type', 'Full Time')->latest()->get();
    $partTimeJobs = Job::where('type', 'Part Time')->latest()->get();

    return view('jobs.home', compact(
        'categories',
        'featuredJobs',
        'fullTimeJobs',
        'partTimeJobs'
    ));
}




    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }


public function jobsByCategory($id)
{
    $category = Category::with('jobs')->findOrFail($id); // جلب الكاتيجوري مع الوظائف
    $jobs = $category->jobs()->latest()->paginate(5);   // جلب الوظائف مع pagination

    return view('jobs.byCategory', compact('category', 'jobs'));
}






}
