<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('viewvisitors')) {
            $this->trunk();
            $visitors = Visitor::all();
            return view('admin.visitors.index', compact('visitors'));
        } else {
            Log::newLog("Usuário tentou acesso area restrita VISITORS, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function trunk()
    {
        $year = date('Y');
        return DB::table('visitors')->whereYear('created_at', '<', $year)->delete();
    }
}
