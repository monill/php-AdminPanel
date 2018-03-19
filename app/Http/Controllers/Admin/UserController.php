<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddUserReq;
use App\Http\Requests\ProfilePassReq;
use App\Http\Requests\ProfileReq;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    //TODO
    //finish all this
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  User::findOrFail(Auth::user()->id);
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
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

        flash("Usuário cadastrado com sucesso!")->success();
        return redirect('dashboard/adduser');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
