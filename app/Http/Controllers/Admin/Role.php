<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role as r;
use App\Model\User;
use App\Model\RolePerm;

class Role extends Controller
{
    public function create()
    {
        return view('admin.role.create');
    }

    public function add()
    {
        $data=request()->input();
        $arr=[
            'role_name'=>$data['role_name']
        ];
        $res=r::insert($arr);
        return redirect('admin/role_index');
    }

    public function index()
    {
        $data=r::where(['is_del'=>1])->get();
        return view('admin.role.index',['data'=>$data]);
    }

    public function del()
    {
        $id=request()->id;
        $res=r::where(['role_id'=>$id])->update(['is_del'=>2]);
        $res2=User::where(['role_id'=>$id])->update(['u_del'=>2]);
        $res3=RolePerm::where(['role_id'=>$id])->update(['is_dels'=>2]);

        if($res && $res2 && $res3){
            return $arr=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }

    public function edit()
    {
        $id=request()->id;
        $res=r::where(['role_id'=>$id])->first();
        return view('admin.role.edit',['data'=>$res]);
    }

    public function upd()
    {
        $data=request()->except('_token');
        $res=r::where(['role_id'=>$data['role_id']])->update($data);
        if($res){
            return redirect('admin/role_index');
        }
    }

}
