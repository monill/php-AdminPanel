<?php

namespace App\Http\Controllers\Api;

use App\Models\Visitor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class VisitorsController extends Controller
{
    public function __construct()
    {
        
    }

    public function os()
    {
        $all = Visitor::count();

        if (!Cache::has('os_usage')) {
            $os = DB::table('visitors')->select(DB::raw('count(*) as oss, os_system'))->groupBy('os_system')->get();
            $data = [];
            foreach ($os as $key => $item) {
                $percent = (Visitor::where('os_system', '=', $item->os_system)->count() / $all) * 100;
                $data[$key] = new \stdClass();
                $data[$key]->label = $item->os_system;
                $data[$key]->value = $percent;
            }
            Cache::put('os_usage', $data, 10);
        } else {
            $data = Cache::get('os_usage');
        }

        return json_encode($data);
    }

    public function browser()
    {
        $all = Visitor::count();

        if (!Cache::has('browsers')) {
            $os = DB::table('visitors')->select(DB::raw('count(*) as browsers, browser'))->groupBy('browser')->get();
            $data = [];
            foreach ($os as $key => $item) {
                $percent = (Visitor::where('browser', '=', $item->browser)->count() / $all) * 100;
                $data[$key] = new \stdClass();
                $data[$key]->label = $item->browser;
                $data[$key]->value = $percent;
            }
            Cache::put('browsers', $data, 10);
        } else {
            $data = Cache::get('browsers');
        }

        return json_encode($data);
    }

    public function countries()
    {
        $all = Visitor::count();

        if (!Cache::has('countries')) {
            $os = DB::table('visitors')->select(DB::raw('count(*) as countries, country'))->groupBy('country')->get();
            $data = [];
            foreach ($os as $key => $item) {
                $percent = (Visitor::where('country', '=', $item->country)->count() / $all) * 100;
                $data[$key] = new \stdClass();
                $data[$key]->label = $item->country;
                $data[$key]->value = $percent;
            }
            Cache::put('countries', $data, 10);
        } else {
            $data = Cache::get('countries');
        }

        return json_encode($data);
    }
}
