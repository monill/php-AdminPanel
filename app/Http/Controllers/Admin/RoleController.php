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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $perms = Permission::all();
        return view('admin.roles.index', compact('roles', 'perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perms = Permission::all();
        $rolePerm = DB::table('permission_role')->where('permission_role.role_id')->pluck('permission_role.permission_id', 'permission_role.permission_id')->all();
        return view('admin.roles.add', compact('perms', 'rolePerm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->save();

        foreach ($request->get('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        flash("Regra criada com sucesso.")->success();

        return redirect('dashboard/roles');
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
        $role = Role::findOrFail($id);
        $perms = Permission::all();
        $rolePerm = DB::table('permission_role')->where('permission_role.role_id', $id)->pluck('permission_role.permission_id', 'permission_role.permission_id')->all();
        return view('admin.roles.edit', compact('role', 'perms', 'rolePerm'));
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
        $role = Role::findOrFail($id);
        $role->name = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->update();

        DB::table('permission_role')->where('permission_role.role_id', $id)->delete();

        foreach ($request->get('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect('dashboard/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete($id);
        return redirect()->back();
    }
}
