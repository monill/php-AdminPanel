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

    public function index()
    {
        if (Auth::user()->can('viewroles')) {
            $perms = Permission::all();
            return view('admin.perms.index', compact('perms'));
        } else {
            return view('admin.layout.403');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->can('createroles')) {
            $perm = new Permission();
            $perm->name = $request->get('name');
            $perm->display_name = $request->get('display_name');
            $perm->save();

            Log::newLog("Usuário criou nova permissao, user: " . Auth::user()->name);

            flash("Permissão criada com sucesso.")->success();
            return redirect()->back();
        } else {
            return view('admin.layout.403');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->can('editroles')) {
            $perm = Permission::findOrFail($id);
            $perm->name = $request->get('name');
            $perm->display_name = $request->get('display_name');
            $perm->update();

            Log::newLog("Usuário alterou permissao-$id, user: " . Auth::user()->name);

            flash("Permissão alterada com sucesso.")->success();
            return redirect()->back();
        } else {
            return view('admin.layout.403');
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->can('deleteroles')) {
            Permission::findOrFail($id)->destroy($id);

            Log::newLog("Usuário deletou permissao-$id, user: " . Auth::user()->name);

            flash("Permissão deletada.")->success();
            return redirect()->back();
        } else {
            return view('admin.layout.403');
        }
    }
}
