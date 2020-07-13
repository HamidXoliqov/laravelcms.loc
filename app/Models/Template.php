<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'template';

    protected $fillable = [
        'title',
        'slug',
        'module',
        'role',
    ];
    public static function add($fildes)
    {
    	$post = new static;
    	$post->fill($fildes);
        $post->module = ($fildes['module']==''||$fildes['module']==null)?'q':$fildes['module'];
        $post->role = ($fildes['module']==null)?'0':'1';
    	$post->save();
    }

    public function edit($fildes)
    {
    	$this->fill($fildes);
        $this->module = ($fildes['module']==''||$fildes['module']==null)?'q':$fildes['module'];
        $this->role = ($fildes['module']=='q'||$fildes['module']==null)?'0':'1';
    	$this->save();
    }
}
