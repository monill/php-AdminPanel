<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('r-roles'))
        {
            $roles = Role::all();
            $perms = Permission::all();
            return view('admin.roles.index', compact('roles', 'perms'));
        } else {
            Log::newLog("Usuário tentou acessar: R-ROLES, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function create()
    {
        if (Auth::user()->can('c-roles'))
        {
            $perms = Permission::all();
            return view('admin.roles.add', compact('perms', 'rolePerm'));
        } else {
            Log::newLog("Usuário tentou criar: C-ROLES, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->can('c-roles'))
        {
            $role = new Role();
            $role->name = $request->get('name');
            $role->description = $request->get('description');
            $role->save();

            foreach ($request->get('permission') as $key => $value) {
                $role->attachPermission($value);
            }

            flash("Regra criada com sucesso.")->success();
            return redirect('dashboard/roles');
        } else {
            Log::newLog("Usuário tentou cadastrar: C-ROLES, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->can('u-roles'))
        {
            $role = Role::findOrFail($id);
            $perms = Permission::all();
            $rolePerm = DB::table('permission_role')->where('permission_role.role_id', $id)->pluck('permission_role.permission_id', 'permission_role.permission_id')->all();
            return view('admin.roles.edit', compact('role', 'perms', 'rolePerm'));
        } else {
            Log::newLog("Usuário tentou editar: U-ROLES-{$id}, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->can('u-roles'))
        {
            $role = Role::findOrFail($id);
            $role->name = $request->get('name');
            $role->description = $request->get('description');
            $role->update();

            DB::table('permission_role')->where('permission_role.role_id', $id)->delete();

            foreach ($request->get('permission') as $key => $value) {
                $role->attachPermission($value);
            }

            return redirect('dashboard/roles');
        } else {
            Log::newLog("Usuário tentou atualizar: U-ROLES-{$id}, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->can('d-roles'))
        {
            DB::table('roles')->where('id', $id)->delete($id);
            return redirect()->back();
        } else {
            Log::newLog("Usuário tentou deletar: D-ROLES-{$id}, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }
}
