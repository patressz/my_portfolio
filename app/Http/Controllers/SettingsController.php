<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('settings')->with( compact('settings') );
    }

    public function registration(Request $request, Setting $setting)
    {
        $setting->where('name', 'registration')->update([
            'value' => $request->status,
        ]);

        return redirect()->route('index.settings')->withStatus('Settings successfully updated!');
    }


}
