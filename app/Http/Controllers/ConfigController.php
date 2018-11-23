<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function set(Request $request)
    {
        $config = Config::where('name',$request->name)->first();
        $config->attribute = $request->attribute;
        $config->save();
        return back();
    }
}
