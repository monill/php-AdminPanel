<?php

namespace App\Http\Controllers\Admin;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        if (Auth::user()->can('viewlogs')) {
            $logs = Log::all();
            return view('admin.logs.index', compact('logs'));
        } else {
            return view('admin.layout.403');
        }
    }

}
