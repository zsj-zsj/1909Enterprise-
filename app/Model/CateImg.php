<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CateImg extends Model
{
    protected  $primaryKey='id';
    protected $table = 'cateimg';
    protected $guarded = [];
    public $timestamps = false;
}
