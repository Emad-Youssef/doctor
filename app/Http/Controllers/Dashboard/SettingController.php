<?php

namespace App\Http\Controllers\Dashboard;

use App\Setting;
use App\includes\Helpers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_settings'])->only('edit');
        $this->middleware(['permission:update_settings'])->only('update');

    }//end of constructor
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('dashboard.settings',['title' => 'settings', 'setting' => $setting]);
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

        
        $validator = Validator::make($request->all(),[
            'ar.sitename'               => 'nullable|string',
            'en.sitename'               => 'required|string',
            'logo'                      => 'nullable|image|mimes:png,jpg,jpeg',
            'icon'                      => 'nullable|image|mimes:png,jpg,jpeg',
            'email'                     => 'nullable|email',
            'phone_f'                   => 'nullable',
            'phone_l'                   => 'nullable',
            'ar.address'                => 'nullable|string',
            'en.address'                => 'nullable|string',
            'ar.about_us'               => 'nullable|string',
            'en.about_us'               => 'nullable|string',
            'ar.keywords'               => 'nullable|string',
            'en.keywords'               => 'nullable|string',
            'status'                    => 'required|in:open,close|string',
            'ar.message_maintenace'     => 'nullable|string',
            'en.message_maintenace'     => 'nullable|string',
        ],[],[
            'sitename_ar'   => trans('site.sitename_ar'),
            'sitename_en'   => trans('site.sitename_en'),
            'logo'          => trans('site.logo'),
            'icon'   => trans('site.icon'),
        ]);

        if($validator->fails()){

            return response()->json([
                'status'    => 0,
                'message'   => $validator->errors()
            ]);
        }

        $setting = Setting::find($id);
        $passtLogo =  $setting->logo;
        $passtIcon =  $setting->icon;
        $setting->fill($request->all());
        if($request->hasFile('logo')){
            Storage::delete($passtLogo);
            $setting->logo = Helpers::upload($request->logo,'settings');
        }

        if($request->hasFile('icon')){
            Storage::delete($passtIcon);
            $setting->icon = Helpers::upload($request->icon,'settings');
        }
        $setting->save();

        return response()->json([
            'status'    => 1,
            'message'   => trans('site.updeted_done')
        ]);
    }

}
