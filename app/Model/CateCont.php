<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CateCont extends Model
{
    protected  $primaryKey='id';
    protected $table = 'cate_contents';
    protected $guarded = [];
    public $timestamps = false;
}
