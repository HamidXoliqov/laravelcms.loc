<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class Pages extends Model
{
    protected $table = 'pages';

    protected $fillable =[
    	'menu_id',
    	'title',
    	'short',
    	'text',
    	'slug',
    	'image',
    	'time',
    	'views',
    	'telegram',
    	'facebook',
    	'status',
    ];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model){
            $model->time = time();
            $model->slug = Str::slug($model->title);
        });
    }
    public static function add($filds,$images)
    {
        $post = new static;
        $post->fill($filds);
        $post->uploadeImage($images);
        if($post->save())
        {
            Pages::getPage_add($filds['menu_id']);
        }
    }
    public function edit($filds,$images)
    {
        $this->fill($filds); 
        $this->uploadeImage($images);
        $this->slug = Str::slug($this->title);
        $this->save();
    }
    public function uploadeImage($image)
    {
        if ($image == null) {return;}
        $fileNime = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads/pages/',$fileNime);
        $this->image = $fileNime;
        $this->save();
    }
    public function getImage()
    {
        if($this->image == null)
        {
            return 'themes/backend/image/default.png';
        }
        return '/uploads/pages/' . $this->image;
    }
    public static function deleteImage($image)
    {
        if($image!='') {
            Storage::delete('/uploads/pages/'.$image);
        }
    }

    public function incView()
    {        
        setcookie($this->id, 'item', time() + (86400), "/");
        if(!isset($_COOKIE[$this->id])){
            $this->views = $this->views + 1;
            $this->save();
        }                
    }
    public static function getPage_add($id)
    {
        $menu = Menu::find($id);
        $menu->pages = $menu->pages + 1;
        $menu->save();
    }
    public static function getPage_remove($id)
    {
        $menu = Menu::find($id);
        $menu->pages = $menu->pages - 1;
        $menu->save();
    }
}
