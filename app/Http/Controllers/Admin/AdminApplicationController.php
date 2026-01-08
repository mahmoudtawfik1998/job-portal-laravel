<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;

class AdminApplicationController extends Controller
{
    public function index()
    {
        // نجلب كل المتقدمين بترتيب أحدث أولاً، 10 لكل صفحة
        $applications = Application::latest()->paginate(10);

        return view('admin.applications.index', compact('applications'));
    }
}
