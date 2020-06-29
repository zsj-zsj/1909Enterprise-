<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected  $primaryKey='premission_id';
    protected $table = 'permission';
    protected $guarded = [];
    public $timestamps = false;
}
