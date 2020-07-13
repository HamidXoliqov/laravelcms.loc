<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Template;
use App\Models\Pages;
use App\Models\Settings;

class MenupagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $page_count = Settings::getValue('admin_pagination');
        $pages = Pages::where('menu_id',$id)->orderBy('time', 'DESC')->paginate($page_count);
        $menu = Menu::find($id);
        return view('backend.menupages.index',compact('pages','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!is_null($request->get('id')))
        {
            $menu_id = $request->get('id');
            $menu = Menu::find($menu_id);
            return view('backend.menupages.create',compact('menu_id','menu'));    
        }
        else
        {
            return redirect()->route('menu.index');
        }

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
        return redirect('menu/page/'.$request->get('menu_id'));
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
            return view('backend.menupages.view',compact('pages','menu','temp_name'));
        }
        return redirect()->route('menu.index');
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
            $menu = Menu::find($pages->menu_id);
            return view('backend.menupages.edit',compact('pages','menu'));
        }
        return redirect()->route('menu.index');
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
        return redirect('menu/page/'.$request->get('menu_id'));


        // return view('backend.menupages.index',compact('pages','menu'));
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
            Pages::getPage_remove($pages->menu_id);
            Pages::deleteImage($pages->image);
            return back();
        }
    }
}
