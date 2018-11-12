<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public function edit(){
    	$settings = Setting::first();

    	return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request){
    	$request->validate([
    		'site_name' => 'required',
    		'contact_number' => 'required',
    		'contact_email' => 'required',
    		'address' => 'required'
    	]);

    	$settings = Setting::first();
    	$settings->update($request->all());

    	return redirect()->route('settings.edit')->with('success', 'Settings has been saved.');
    }
}
