<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $primaryKey='cate_id';
    protected $table = 'category';
    protected $guarded = [];
    public $timestamps = false;
}
