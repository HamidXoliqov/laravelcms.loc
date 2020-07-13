<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Menu;
use \App\Models\Pages;

class FrontendController extends Controller
{
    public function pages($slug)
    {
    	$menu = Menu::where(['slug'=>$slug])->first();
        $count = 1;
    	if (isset($menu)&&!empty($menu)) {
    		$pages = Pages::where(['menu_id'=>$menu->id])->paginate(1);
    	}

    	switch ($slug) {
    		case 'news':
    			return view('frontend.news.pages',compact('menu','pages','count'));
    			break;
    		case 'tech':
    			return view('frontend.tech.pages',compact('menu','pages','count'));
    			break;
    		case 'event':
    			return view('frontend.event.pages',compact('menu','pages','count'));
    			break;
    		case 'projects':
    			return view('frontend.projects.pages',compact('menu','pages','count'));
    			break;   		
    		default:
                return view('errors.404');
    			break;
    	}
    }

    public function page($slug, $key)
    {
    	$menu = Menu::where(['slug'=>$slug])->first();
    	if (isset($menu)&&!empty($menu)) {
    		$page = Pages::where(['slug'=>$key])->first();
            $page->incView();
    	}
    	switch ($slug) {
    		case 'news':
    			return view('frontend.news.page',compact('menu','page'));
    			break;
    		case 'tech':
    			return view('frontend.tech.page',compact('menu','page'));
    			break;
    		case 'event':
    			return view('frontend.event.page',compact('menu','page'));
    			break;
    		case 'projects':
    			return view('frontend.projects.page',compact('menu','page'));
    			break;   		
    		default:
                return view('errors.404');
    			break;
    	}
    }
}
