<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CateImg as img;

class CateImg extends Controller
{
    public function create()
    {
        return view('admin.cateimg.create');
    }

    public function upload(Request $request)
    {
        $fileInfo=$_FILES['Filedata'];
        $tmpName=$fileInfo['tmp_name'];         //临时文件
        $ext=explode(".",$fileInfo['name'])[1];  //文件后缀
        $newName=md5(uniqid()).".".$ext;         //文件名
        $path="./upload/".date("Y/m/d",time());
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }
        $name=$path.$newName;
        move_uploaded_file($tmpName,$name);
        $namepath=ltrim($name,'.');
        echo $namepath;
    }

    public function story(Request $request)
    {
        $data=$request->all();
        $arr=[
            'name'=>$data['name'],
            'url'=>$data['url'],
            'img'=>$data['img'],
            'know'=>$data['know'],
            'time'=>time()
        ];
        $res=img::insert($arr);
        if($res){
            return $a=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }

    public function index()
    {
        $where=[];
        $name=request()->name;
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        $res=img::where($where)->where(['is_del'=>1])->paginate(5);
        $query=request()->all();
        return view('admin.cateimg.index',['data'=>$res,'query'=>$query]);
    }

    public function del()
    {
        $id=request()->id;
        $res=img::where(['i_id'=>$id])->update(['is_del'=>2]);
        if($res){
            return $arr=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }

    public function edit()
    {
        $id=request()->id;
        $res=img::where(['i_id'=>$id])->first();
        return view('admin.cateimg.edit',['data'=>$res]);
    }

    public function upd()
    {
        $data=request()->all();
        $arr=[
            'name'=>$data['name'],
            'url'=>$data['url'],
            'img'=>$data['img'],
            'know'=>$data['know'],
        ];
        $res=img::where(['i_id'=>$data['i_id']])->update($arr);
        if($res){
            return $a=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }
}
