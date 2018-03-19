<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Visitor;

class VisitorsController extends Controller
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
        if ($year > $year) {
            \DB::table('visitors')->truncate();
        }
    }
}
