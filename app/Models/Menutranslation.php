<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menutranslation extends Model
{
    protected $table = 'menu_translation';

    protected $fillable =[
    	'menu_id',
    	'title',
    	'lang',
    	'user_id',
    ];

    public static function getLang($id)
    {

    	$lang = Menutranslation::where('menu_id',$id)->get();
    	// dd($lang);
    	return $lang;
    }

}
