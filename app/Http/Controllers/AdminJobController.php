<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class AdminJobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string|max:255',
            'type' => 'required|string|max:255',
            'salary' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        Job::create($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string|max:255',
            'type' => 'required|string|max:255',
            'salary' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $job->update($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
