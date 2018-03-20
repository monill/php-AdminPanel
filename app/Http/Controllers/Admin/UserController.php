<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddUserReq;
use App\Http\Requests\ProfilePassReq;
use App\Http\Requests\ProfileReq;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('viewusers')) {
            if (Auth::user()->class == 'sysop') {
                $users = User::all();
            } else {
                $users = DB::table('users')->where('class', '!=', 'sysop')->get();
            }
            return view('admin.users.index', compact('users'));
        } else {
            return view('admin.layout.403');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AddUserReq $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserReq $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->class = $request->get('class');
        $user->save();

        $user->attachRole($request->get('role'));

        flash("Usuário cadastrado com sucesso!")->success();
        return redirect('dashboard/users');
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        $userRole = $user->roles->pluck('id', $id)->all();

        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
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
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if (!empty($request->get('password'))) {
            $user->password = Hash::make($request->get('password'));
        }
        $user->class = $request->get('class');
        $user->update();

        DB::table('role_user')->where('user_id', $id)->delete();

        $user->attachRole($request->get('role'));

        flash("Usuário alterado com sucesso!")->success();
        return redirect('dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == Auth::user()->id) {
            flash("Você não pode deletar você mesmo")->info();
            return redirect()->back();
        } else {
            User::findOrFail($id)->delete();
            flash("Usuário deletado.")->success();
            return redirect()->back();
        }
    }

    public function profile()
    {
        $user =  User::findOrFail(Auth::user()->id);
        return view('admin.profile.index', compact('user'));
    }

    public function profileupd(ProfileReq $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->description = $request->get('description');

        $img = $request->file('avatar');
        if ($img) {
            if ($user->avatar != null) {
                \File::delete(public_path('uploads/user/' . $user->avatar));
            }

            $local = public_path('uploads/user/');

            $file = $request->get('avatar') . strtolower(str_random(25));
            $image = Image::make("$img");
            $image->backup();
            $image->resize(400, 300)->save($local . $file .'.'. $img->getClientOriginalExtension());

            $user->avatar = $file .'.'. $img->getClientOriginalExtension();
        }

        $user->save();

        flash("Perfil atualizado com sucesso.")->success();
        return redirect('dashboard/profile');
    }

    public function passupd(ProfilePassReq $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->get('password'));
        $user->update();

        flash("Senha atualizada com sucesso!")->success();
        return redirect('dashboard/profile');
    }
}
