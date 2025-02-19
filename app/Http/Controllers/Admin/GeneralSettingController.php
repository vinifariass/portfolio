<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = GeneralSetting::first();
        return view('admin.setting.general-setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => 'max:5000|image',
            'footer_logo' => 'max:5000|image',
            'favicon' => 'max:5000|image',
        ]);

        $setting = GeneralSetting::first();
        $logo = handleUpload('logo', $setting);
        $footer_logo = handleUpload('footer_logo', $setting);
        $favicon = handleUpload('favicon', $setting);

        $generalSetting = GeneralSetting::first();
        $generalSetting->logo = (!empty($logo)) ? $logo : $setting->logo;
        $generalSetting->footer_logo = (!empty($footer_logo)) ? $footer_logo : $setting->footer_logo;
        $generalSetting->favicon = (!empty($favicon)) ? $favicon : $setting->favicon;
        $generalSetting->save();

        toastr('Data has been updated successfully!', 'success');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
