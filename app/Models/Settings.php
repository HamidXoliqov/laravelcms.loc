<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'title',
        'name',
        'value',
        'visibility',
        'user_id',
    ];

    public static function add($filds)
    {
        $post = new static;
        $post->fill($filds);
        $post->save();
    }
    public function edit($filds)
    {
        $this->fill($filds); 
        $this->save();
    }

    public static function getValue($name)
    {
        $value = Settings::where(['name'=>$name])->first();
        if(!empty($value))
        {
           $value = $value->value;  
        }
        else
        {
            $value = 0;
        }
        return $value;
    }
}
