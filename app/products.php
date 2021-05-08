<?php

namespace App;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    /*
    protected $fillable =[
        'Product_name',
        'description',
        'section_id',
        'section_name',
    ];
    */

    protected $guarded=[];

    public function section()
    {
        return $this->belongsTo('App\sections');
    }
}
