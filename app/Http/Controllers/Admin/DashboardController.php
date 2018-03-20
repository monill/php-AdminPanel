<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Service;
use App\Models\Visitor;
use App\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $visitors = Visitor::count();
        $blogs = Blog::count();
        $services = Service::count();
        $users = User::count();

        return view('admin.dashboard', compact('visitors', 'blogs', 'services', 'users'));
    }
}
