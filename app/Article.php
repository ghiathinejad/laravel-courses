<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','slug_fa','body'];
    //
/*    public function getRouteKeyName()
    {
        //return parent::getRouteKeyName(); // TODO: Change the autogenerated stub
        return 'slug_fa';
    }*/
}
