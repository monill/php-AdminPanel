<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('viewlogs')) {
            $logs = DB::table('logs')->orderBy('created_at', 'desc')->get();;
            return view('admin.logs.index', compact('logs'));
        } else {
            return view('admin.layout.403');
        }
    }

}
