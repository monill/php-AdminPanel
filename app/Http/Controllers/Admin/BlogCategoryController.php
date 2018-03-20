<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogCateg;
use App\Models\BlogCategory;
use App\Models\Log;
use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categs = BlogCategory::all();
        return view('admin.blogcategs.index', compact('categs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCateg $request)
    {
        $categ = new BlogCategory();
        $categ->name = $request->get('name');
        $categ->save();

        Log::newLog("Usuário criou novo blog categoria, user: " . Auth::user()->name);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categ = BlogCategory::findOrFail($id);
        $categ->name = $request->get('name');
        $categ->update();

        Log::newLog("Usuário alterou blog cateria-$id, user: " . Auth::user()->name);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::findOrFail($id)->destroy($id);
        Log::newLog("Usuário deletou blog cateria-$id, user: " . Auth::user()->name);
        return redirect()->back();
    }
}
