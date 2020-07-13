<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Template;
use App\Models\Pages;

class SiteController extends Controller
{
	public function index()
	{		
		$query = Pages::query()->leftJoin('menu', 'pages.menu_id=menu.id')->where(['between', 'template_id', "2", "5"]);
        // $pages = $query->get();
		// dd($query);

	    $pages = Pages::all();
	    return view('frontend.site.index',compact('pages'));
	}
}
