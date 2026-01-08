<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'name' => 'required',
            'email' => 'required|email',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'cover_letter' => 'nullable',
            'phone' => 'required',
        ]);
    $data = $request->all();

    
if ($request->hasFile('cv')) {
    $fileName = time() . '_' . $request->cv->getClientOriginalName();
    $filePath = $request->cv->storeAs('cvs', $fileName, 'public');
    $data['cv'] = $filePath;
}

Application::create($data);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

public function show($id)
{
    $applicant = Application::findOrFail($id);
    return view('admin.applications.show', compact('applicant'));
}

public function applicationForm($job_id)
{
    $job = \App\Models\Job::findOrFail($job_id);
    return view('applications.apply', compact('job'));
}



}
