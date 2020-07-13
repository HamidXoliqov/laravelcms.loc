<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Menu;
use App\Models\Settings;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_count = Settings::getValue('admin_pagination');
        $pages = Pages::orderBy('time', 'desc')->paginate($page_count);
        return view('backend.pages.index',compact('pages'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all()->pluck('title','id');
        return view('backend.pages.create',compact('menu'));
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
            'menu_id' =>  'required',
            'title' =>  'required',
            'short' =>  'required',
            'text' =>  'required',
            'image' =>  'required',
        ]);
        Pages::add($request->all(),$request->file('image'));
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_numeric($id)&&!empty(Pages::find($id)))
        {
            $pages = Pages::find($id);
            $menu =  Menu::find($pages->menu_id);
            $temp_name = Menu::temp_name($menu->template_id);
            return view('backend.pages.view',compact('pages','menu','temp_name'));
        }
        return redirect()->route('pages.index'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(is_numeric($id)&&!empty(Pages::find($id)))
        {
            $pages = Pages::find($id);
            $menus = Menu::all()->pluck('title','id');
            $menu = Menu::find($pages->menu_id);
            return view('backend.pages.edit',compact('pages','menu','menus'));
        }
        return redirect()->route('pages.index'); 
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
        if(is_numeric($id)&&!empty(Pages::find($id)))
        {   
            $pages = Pages::find($id);
            $request->validate([
                'menu_id' => 'required',
                'title' => 'required',
                'short' => 'required',
                'text' => 'required',
            ]);        
            if ($request->file('image')){
                Pages::deleteImage($pages->image);
            }
            $pages->edit($request->all(),$request->file('image'));
        }
        return redirect()->route('pages.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Pages::find($id);
        if($pages->delete())
        {
            Pages::deleteImage($pages->image);
            return back();
        } 
    }
    public function up($id)
    {
        $page = Pages::find($id);
        $time = $page->time;
        $page->time = $time+60;
        if($page->save()){
            echo json_encode('success');
        }
        else{
            echo json_encode('error');
        }
    }
    public function down($id)
    {
        $page = Pages::find($id);
        $time = $page->time;
        $page->time = $time-60;
        if($page->save()){
            echo json_encode('success');
        }
        else{
            echo json_encode('error');
        }
    }
    public function status($id)
    {
        $page = Pages::find($id);
        if($page->status ==1)
        {
            $page->status = 0;
        }
        else
        {
            $page->status = 1;
        }
        if($page->save()){
            echo json_encode('success');
        }
        else{
            echo json_encode('error');
        }
    }
}
