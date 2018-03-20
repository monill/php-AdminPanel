<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index()
    {
        $this->trunk();
        $visitors = Visitor::all();
        return view('admin.visitors.index', compact('visitors'));
    }

    public function trunk()
    {
        $year = date('Y');
        return DB::table('visitors')->whereYear('created_at', '<', $year)->delete();
    }
}
