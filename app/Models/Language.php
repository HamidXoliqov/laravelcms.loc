<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class Language extends Model
{
    protected $table = 'language';

    protected $fillable = [
        'url',
        'name_des',
        'name_mob',
        'image',
        'default',
    ];

    public static function add($filds,$images)
    {

        $post = new static;
        $post->fill($filds);
        $post->uploadeImage($images);
        $post->save();
    }
    public function edit($filds,$images)
    {
        $this->fill($filds); 
        $this->uploadeImage($images);
        $this->save();
    }
    public function uploadeImage($image)
    {
        if ($image == null) {return;}
        $fileNime = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads/lang/',$fileNime);
        $this->image = $fileNime;
        $this->save();
    }
    public function getImage()
    {
        if($this->image == null)
        {
            return 'themes/backend/image/default.png';
        }
        return '/uploads/lang/' . $this->image;
    }
    public static function deleteImage($image)
    {
        if($image!='') {
            Storage::delete('/uploads/lang/'.$image);
        }
    }
}
