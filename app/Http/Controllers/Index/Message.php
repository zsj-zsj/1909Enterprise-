<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Message as m;

class Message extends Controller
{
    //前台
    public function index()
    {
        return view('index.liuyan');
    }

    public function domessage()
    {
        $data=request()->input();
        $arr=[
            'name'=>$data['name'],
            'face'=>$data['face'],
            'text'=>$data['text'],
            'time'=>time()
        ];
        if(!$data['code']){
            return $arr=[
                'msg'=>'请输入验证码',
                'yes'=>12345
            ]; 
        }
        if(!captcha_check($data['code'])){
            return $arr=[
                'msg'=>'验证码不对',
                'yes'=>1234522
            ];
        }
        $res=m::insert($arr);
        if($res){
            return $arr=[
                'msg'=>'留言成功',
                'yes'=>0
            ];
        }

    }


    //后台展示
    public function adminlist()
    {
        $res=m::get();
        return view('admin.message.index',['data'=>$res]);
    }
}