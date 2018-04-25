<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('r-visitors'))
        {
            $this->trunk();
            $visitors = DB::table('visitors')->orderBy('id', 'desc')->get();
            return view('admin.visitors.index', compact('visitors'));
        } else {
            Log::newLog("Usuário tentou acessar: R*VISITORS, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function trunk()
    {
        $year = date('Y');
        return DB::table('visitors')->whereYear('created_at', '<', $year)->delete();
    }
}
