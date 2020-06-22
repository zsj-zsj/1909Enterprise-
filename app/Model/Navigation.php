<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected  $primaryKey='id';
    protected $table = 'navigation';
    protected $guarded = [];
    public $timestamps = false;
}
