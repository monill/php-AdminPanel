<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Log;

class LogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('r-logs'))
        {
            $logs = Log::orderBy('created_at', 'desc')->get();;
            return view('admin.logs.index', compact('logs'));

        } else {
            Log::newLog("Usuário tentou acessar: R-LOGS, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

}
