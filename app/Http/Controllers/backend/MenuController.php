<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Template;
use App\Models\Pages;
use App\Models\Settings;
use App\Models\Menutranslation;
use App\Models\Language;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $lang  = 
        // dd(Menutranslation::getLang(1));
        $lang = Language::all();
        $page_count = Settings::getValue('admin_pagination');
        $menus = Menu::orderBy('order_num', 'desc')->paginate($page_count);
        return view('backend.menu.index',compact('menus','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temp = Template::all()->pluck('title','id');
        $temp_str = Template::where(['role'=>1])->pluck('title','id');
        return view('backend.menu.create',compact('temp','temp_str'));
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
            'template_id'  => 'required',
        ]);
        Menu::add($request->all(),$request->file('image'));
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_numeric($id)&&!empty(Menu::find($id)))
        {
            $menu = Menu::find($id);
            $temp_slug =  Menu::temp_slug($menu->template_id);
            $temp_name = Menu::temp_name($menu->template_id);
            return view('backend.menu.view',compact('menu','temp_slug','temp_name'));
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
        if(is_numeric($id)&&!empty(Menu::find($id)))
        {
            $temp = Template::all()->pluck('title','id');
            $temp_str = Template::where(['role'=>1])->pluck('title','id');
            $menu = Menu::find($id);
            $value = $menu->template_id;
            $temp_name = Menu::temp_name($menu->template_id);
            $temp_names = ($menu->module)?$temp_name:'Template';
            return view('backend.menu.edit',compact('menu','temp_name','temp','value','temp_str','temp_names'));
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
        if(is_numeric($id)&&!empty(Menu::find($id)))
        {
            $menu = Menu::find($id);
            $request->validate([
                'title' =>  'required',
                'template_id'  => 'required',
            ]);
            if ($request->file('image')){
                Menu::deleteImage($menu->image);
            }
            $menu->edit($request->all(),$request->file('image'));
        }
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        if($menu->delete())
        {
            $page = Pages::where('menu_id',$id)->get();
                    // dd($page);
            if(Pages::query()->where('menu_id',$id)->delete())
            {
                foreach ($page as $key => $value) {
                    Pages::deleteImage($value->image);
                }
            }
            Menu::deleteImage($menu->image);
            return back();
        }
    }
    public function up($id)
    {
        $menu = Menu::find($id);
        $max = Menu::max('order_num');
        $order_num = $menu->order_num;
        if($order_num==$max)
        {
            $menu->order_num = $max;
        }
        else
        {            
            $menu->order_num = $order_num + 1;
        }
        if($menu->save()){
            echo json_encode('success');
        }
        else{
            echo json_encode('error');
        }
    }
    public function down($id)
    {
        $menu = Menu::find($id);
        $min = Menu::min('order_num');
        $order_num = $menu->order_num;
        if($order_num==$min)
        {
            $menu->order_num = $min;
        }
        else
        {            
            $menu->order_num = $order_num - 1;
        }
        if($menu->save()){
            echo json_encode('success');
        }
        else{
            echo json_encode('error');
        }
    }
    public function status($id)
    {
        $menu = Menu::find($id);
        if($menu->status ==1)
        {
            $menu->status = 0;
        }
        else
        {
            $menu->status = 1;
        }
        if($menu->save()){
            echo json_encode('success');
        }
        else{
            echo json_encode('error');
        }
    }

}
