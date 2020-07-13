<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Template;
use App\Models\Pages;

class StandardController extends Controller
{
	public function index($slug)
	{		
		$menu = Menu::where(['slug'=>$slug])->first();
    	if (isset($menu)&&!empty($menu)) {
    		$pages = Pages::where(['menu_id'=>$menu->id])->get();
    	}
    	switch ($slug) {
    		case 'contact':
    			return view('frontend.contact.index',compact('menu','pages'));
    			break;
    		case 'gallery':
    			return view('frontend.gallery.index',compact('menu','pages'));
    			break;
    		case 'video':
    			return view('frontend.video.index',compact('menu','pages'));
    			break;    		
    		default:
                return view('errors.404');
    			break;
    	}
	}
}
