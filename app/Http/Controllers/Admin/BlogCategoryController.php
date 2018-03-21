<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogCateg;
use App\Models\BlogCategory;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        if (Auth::user()->can('viewblogcatg')) {
            $categs = BlogCategory::all();
            return view('admin.blogcategs.index', compact('categs'));
//        } else {
//            Log::newLog("Usuário tentou acesso area restrita BLOGCATEG, user: " . Auth::user()->name);
//            return view('admin.layout.403');
//        }
    }

    public function store(BlogCateg $request)
    {
//        if (Auth::user()->can('createblogcatg')) {
            $categ = new BlogCategory();
            $categ->name = $request->get('name');
            $categ->save();

            Log::newLog("Usuário criou novo blog categoria, user: " . Auth::user()->name);
            return redirect()->back();
//        } else {
//            Log::newLog("Usuário tentou criar area restrita BLOGCATEG, user: " . Auth::user()->name);
//            return view('admin.layout.403');
//        }

    }

    public function update(Request $request, $id)
    {
//        if (Auth::user()->can('editblogcatg')) {
            $categ = BlogCategory::findOrFail($id);
            $categ->name = $request->get('name');
            $categ->update();

            Log::newLog("Usuário alterou blog cateria-$id, user: " . Auth::user()->name);
            return redirect()->back();
//        } else {
//            Log::newLog("Usuário tentou atualizar area restrita BLOGCATEG-$id, user: " . Auth::user()->name);
//            return view('admin.layout.403');
//        }
    }

    public function destroy($id)
    {
//        if (Auth::user()->can('deleteblogcatg')) {
            BlogCategory::findOrFail($id)->destroy($id);
            Log::newLog("Usuário deletou blog cateria-$id, user: " . Auth::user()->name);
            return redirect()->back();
//        } else {
//            Log::newLog("Usuário tentou deletar area restrita BLOGCATEG-$id, user: " . Auth::user()->name);
//            return view('admin.layout.403');
//        }
    }
}
