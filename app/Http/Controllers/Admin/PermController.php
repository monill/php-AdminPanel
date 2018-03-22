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
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('r-roles'))
        {
            $perms = Permission::all();
            return view('admin.permissions.index', compact('perms'));
        } else {
            Log::newLog("Usuário tentou acessar: R-ROLES, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->can('c-roles'))
        {
            $perm = new Permission();
            $perm->name = $request->get('name');
            $perm->description = $request->get('description');
            $perm->save();

            Log::newLog("Usuário criou nova permissao, user: " . Auth::user()->name);

            flash("Permissão criada com sucesso.")->success();
            return redirect()->back();
        } else {
            Log::newLog("Usuário tentou criar: C-ROLES, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->can('u-roles'))
        {
            $perm = Permission::findOrFail($id);
            $perm->name = $request->get('name');
            $perm->description = $request->get('description');
            $perm->update();

            Log::newLog("Usuário alterou permissao-{$id}, user: " . Auth::user()->name);

            flash("Permissão alterada com sucesso.")->success();
            return redirect()->back();
        } else {
            Log::newLog("Usuário tentou atualizar: U-ROLES-{$id}, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->can('d-roles'))
        {
            Permission::findOrFail($id)->destroy($id);

            Log::newLog("Usuário deletou permissao-{$id}, user: " . Auth::user()->name);

            flash("Permissão deletada.")->success();
            return redirect()->back();
        } else {
            Log::newLog("Usuário tentou deletar: D-ROLES-{$id}, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }
}
