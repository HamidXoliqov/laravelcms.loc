<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_count = Settings::getValue('admin_pagination');
        $settings = Settings::where(['visibility'=>1])->paginate($page_count);
        return view('backend.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();
        return view('backend.settings.create',compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>  'required',
            'name'  => 'required',
            'value'  => 'required',
            'user_id' => 'required',
        ]);
        Settings::add($request->all());
        return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Settings::find($id);
        return view('backend.settings.view',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Settings::find($id);
        $user_id = $setting->user_id;
        return view('backend.settings.edit',compact('setting','user_id'));
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
        $request->validate([
            'title' =>  'required',
            'name'  => 'required',
            'value'  => 'required',
            'user_id' => 'required',
        ]);
        $setting = Settings::find($id);

        $setting->edit($request->all());
        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $setting = Settings::find($id);
       if($setting->delete())
       {
            return back();
       } 
    }
}
