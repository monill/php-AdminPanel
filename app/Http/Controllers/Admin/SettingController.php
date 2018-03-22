<?php

namespace App\Http\Controllers\Admin;

use App\Models\Log;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('r-settings'))
        {
            $setting = Setting::findOrFail(1);
            return view('admin.settings.index', compact('setting'));
        } else {
            Log::newLog("Usuário tentou acessar: R-SETTINGS, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->can('u-settings'))
        {
            $sett = $request->except('_token');
            foreach ($sett as $key => $value) {
                DB::table('settings')->where('id', 1)->update([$key => $value]);
            }

            Log::newLog("Usuário alterou/criou Configurações, user: " . Auth::user()->name);

            flash("Configurações alterada com sucesso!")->info();
            return redirect()->back();
        } else {
            Log::newLog("Usuário tentou alterar: U-SETTINGS, user: " . Auth::user()->name);
            return view('admin.layout.403');
        }
    }

}
