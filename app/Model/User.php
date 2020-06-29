<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected  $primaryKey='user_id';
    protected $table = 'user';
    protected $guarded = [];
    public $timestamps = false;
}
