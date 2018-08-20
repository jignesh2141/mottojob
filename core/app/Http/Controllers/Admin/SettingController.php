<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::where('id',1)->get();
        return view('admin.settings',['setting'=>$setting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);

        $id = 1;
        $setting = Setting::find($id);
        $setting->title = $request->title;
        $setting->meta_keywords = $request->meta_keywords;
        $setting->meta_description = $request->meta_description;
        $setting->save();

        $setting = Setting::where('id',$id)->get();
        return view('admin.settings',['setting'=>$setting])->with('message', 'Details updated successfully.');
    }
}
