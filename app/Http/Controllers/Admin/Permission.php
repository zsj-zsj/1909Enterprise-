<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Permission as p;
use App\Model\RolePerm;

class Permission extends Controller
{
    public function create()
    {
        // $perm=p::where(['parent_id'=>0])->get();
        $perm=p::get();

        return view('admin.permission.create',['perm'=>$perm]);
    }

    public function add()
    {
        $data=request()->input();
        $arr=[
            'permission_name'=>$data['permission_name'],
            'url'=>$data['url'],
            // 'parent_id'=>$data['parent_id']
        ];
        $res=p::insert($arr);
        return redirect('admin/permission_index');
    }

    public function index()
    {
        $data=p::where(['is_del'=>1])->get();
        return view('admin.permission.index',['data'=>$data]);        
    }

    public function del()
    {
        $id=request()->id;
        $res=p::where(['permission_id'=>$id])->update(['is_del'=>2]);
        $res2=RolePerm::where(['permission_id'=>$id])->update(['is_dels'=>2]);

        if($res && $res2){
            return $arr=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }

    public function edit()
    {
        $id=request()->id;
        $res=p::where(['permission_id'=>$id])->first();
        return view('admin.permission.edit',['data'=>$res]);        
    }

    public function upd()
    {
        $data=request()->except('_token');
        $res=p::where(['permission_id'=>$data['permission_id']])->update($data);
        if($res){
            return redirect('admin/permission_index');        
        }
    }

}
