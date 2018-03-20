<?php

namespace App\Http\Controllers\Admin;

use App\Models\Log;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perms = Permission::all();
        return view('admin.perms.index', compact('perms'));
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
    public function store(Request $request)
    {
        $perm = new Permission();
        $perm->name = $request->get('name');
        $perm->display_name = $request->get('display_name');
        $perm->save();

        Log::newLog("Usuário criou nova permissao, user: " . Auth::user()->name);

        flash("Permissão criada com sucesso.")->success();
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
        $perm = Permission::findOrFail($id);
        $perm->name = $request->get('name');
        $perm->display_name = $request->get('display_name');
        $perm->update();

        Log::newLog("Usuário alterou permissao-$id, user: " . Auth::user()->name);

        flash("Permissão alterada com sucesso.")->success();
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
        Permission::findOrFail($id)->destroy($id);

        Log::newLog("Usuário deletou permissao-$id, user: " . Auth::user()->name);

        flash("Permissão deletada.")->success();
        return redirect()->back();
    }
}
