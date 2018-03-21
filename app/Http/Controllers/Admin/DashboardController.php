<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Service;
use App\Models\Visitor;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

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

    public function cleanCache()
    {
        //Clear Cache facade value:
        Artisan::call('cache:clear');

        //Reoptimized class loader:
//        Artisan::call('optimize');

        //Clear Route cache:
//        Artisan::call('route:cache');

        //Clear View cache:
        Artisan::call('view:clear');

        //Clear Config cache:
        Artisan::call('config:cache');

        return redirect()->back();
    }
}
