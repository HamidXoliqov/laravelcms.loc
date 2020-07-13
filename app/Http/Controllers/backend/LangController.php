<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Storage;


class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Language::all();
        return view('backend.lang.index',compact('lang'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $default = [0,1];
        return view('backend.lang.create',compact('default')); 
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
            'url' =>  'required',
            'name_des'  => 'required',
            'name_mob' => 'required',
            // 'image' => 'required',
            'default' => 'required',
        ]);
        Language::add($request->all(),$request->file('image'));
        return redirect()->route('lang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lang = Language::find($id);
        return view('backend.lang.view',compact('lang'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $default = [0,1];
        $lang = Language::find($id);
        return view('backend.lang.edit',compact('lang','default'));
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
            'url' =>  'required',
            'name_des'  => 'required',
            'name_mob' => 'required',
            'default' => 'required',
        ]);
        $lang = Language::find($id);
        if ($request->file('image')){

            Language::deleteImage($lang->image);
        }
        $lang->edit($request->all(),$request->file('image'));
        return redirect()->route('lang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Language::find($id);
        if($lang->delete())
        {
            Language::deleteImage($lang->image);
            return back();
        } 
    }
    public function status($id)
    {
        $lang = Language::find($id);
        if($lang->default ==1)
        {
            $lang->default = 0;
        }
        else
        {
            $lang->default = 1;
        }
        if($lang->save()){
            echo json_encode('success');
        }
        else{
            echo json_encode('error');
        }
    }
}
