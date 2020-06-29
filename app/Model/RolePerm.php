<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolePerm extends Model
{
    protected  $primaryKey='rp_id';
    protected $table = 'rolepermission';
    protected $guarded = [];
    public $timestamps = false;
}
