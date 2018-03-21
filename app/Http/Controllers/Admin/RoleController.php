<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        if (Auth::user()->can('viewperms')) {
            $roles = Role::all();
            $perms = Permission::all();
            return view('admin.roles.index', compact('roles', 'perms'));
        } else {
            return view('admin.layout.403');
        }
    }

    public function create()
    {
        if (Auth::user()->can('createperms')) {
            $perms = Permission::all();
            $rolePerm = DB::table('permission_role')->where('permission_role.role_id')->pluck('permission_role.permission_id', 'permission_role.permission_id')->all();
            return view('admin.roles.add', compact('perms', 'rolePerm'));
        } else {
            return view('admin.layout.403');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->can('createperms')) {
            $role = new Role();
            $role->name = $request->get('name');
            $role->display_name = $request->get('display_name');
            $role->save();

            foreach ($request->get('permission') as $key => $value) {
                $role->attachPermission($value);
            }

            flash("Regra criada com sucesso.")->success();

            return redirect('dashboard/roles');
        } else {
            return view('admin.layout.403');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->can('editperms')) {
            $role = Role::findOrFail($id);
            $perms = Permission::all();
            $rolePerm = DB::table('permission_role')->where('permission_role.role_id', $id)->pluck('permission_role.permission_id', 'permission_role.permission_id')->all();
            return view('admin.roles.edit', compact('role', 'perms', 'rolePerm'));
        } else {
            return view('admin.layout.403');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->can('editperms')) {
            $role = Role::findOrFail($id);
            $role->name = $request->get('name');
            $role->display_name = $request->get('display_name');
            $role->update();

            DB::table('permission_role')->where('permission_role.role_id', $id)->delete();

            foreach ($request->get('permission') as $key => $value) {
                $role->attachPermission($value);
            }

            return redirect('dashboard/roles');
        } else {
            return view('admin.layout.403');
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->can('deleteperms')) {
            DB::table('roles')->where('id', $id)->delete($id);
            return redirect()->back();
        } else {
            return view('admin.layout.403');
        }
    }
}
