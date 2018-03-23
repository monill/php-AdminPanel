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
        if (Auth::user()->can('r-blogcateg'))
        {
            $categs = BlogCategory::all();
            return view('admin.blogcategs.index', compact('categs'));

        } else {
           Log::newLog("Usuário tentou acesso: R-BLOGCATEG, user: " . Auth::user()->name);
           return view('admin.layout.403');
        }
    }

    public function store(BlogCateg $request)
    {
        if (Auth::user()->can('c-blogcateg'))
        {
            $categ = new BlogCategory();
            $categ->name = $request->get('name');
            $categ->save();

            Log::newLog("Usuário criou nova categoria, user: " . Auth::user()->name);
            return redirect()->back();

       } else {
           Log::newLog("Usuário tentou criar: C-BLOGCATEG, user: " . Auth::user()->name);
           return view('admin.layout.403');
       }

    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->can('u-blogcateg'))
        {
            $categ = BlogCategory::findOrFail($id);
            $categ->name = $request->get('name');
            $categ->update();

            Log::newLog("Usuário alterou cateria-{$id}, user: " . Auth::user()->name);
            return redirect()->back();

        } else {
           Log::newLog("Usuário tentou atualizar: U-BLOGCATEG-{$id}, user: " . Auth::user()->name);
           return view('admin.layout.403');
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->can('d-blogcateg'))
        {
            BlogCategory::findOrFail($id)->destroy($id);
            Log::newLog("Usuário deletou categoria-{$id}, user: " . Auth::user()->name);
            return redirect()->back();

        } else {
            Log::newLog("Usuário tentou deletar: D-BLOGCATEG-{$id}, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }
}
