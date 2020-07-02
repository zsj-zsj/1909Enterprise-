<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected  $primaryKey='m_id';
    protected $table = 'message';
    protected $guarded = [];
    public $timestamps = false;
}
