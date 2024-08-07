<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Hoists;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    //

    public function general()
    {
        $template = Settings::orderBy('id', 'asc')->get();

        return view('admin.settings.general', compact('template'));
    }


    public function generalSave(Request $request)
    {

    }
}
