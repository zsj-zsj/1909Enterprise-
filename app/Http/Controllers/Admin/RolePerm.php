<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;
use App\Model\Permission;
use App\Model\RolePerm as rp;

class RolePerm extends Controller
{
    public function create()
    {
        $role=Role::get();
        // $perm=Permission::where('parent_id','=',0)->get();
        $perm=Permission::get();

        return view('admin.roleperm.create',['role'=>$role,'perm'=>$perm]);
    }

    public function add()
    {
        $data=request()->input();
        $arr=[];
        foreach($data['permission_id'] as $k=>$v){
            $arr[]=[
                'role_id'=>$data['role_id'],
                'permission_id'=>$v
            ];
        }
        rp::insert($arr);
        return redirect('admin/role_perm_index');
    }

    public function index()
    {
        $data=rp::join('role','role.role_id','=','rolepermission.role_id')
            ->join('permission','permission.permission_id','=','rolepermission.permission_id')->where(['is_dels'=>1])->get();
        return view('admin.roleperm.index',['data'=>$data]);
    }

    public function del()
    {
        $id=request()->id;
        $res=rp::where(['rp_id'=>$id])->update(['is_dels'=>2]);
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
        $res=rp::where(['rp_id'=>$id])->first();
        $role=Role::get();
        $perm=Permission::get();
        return view('admin.roleperm.edit',['res'=>$res,'role'=>$role,'perm'=>$perm]);

    }

    public function upd()
    {
        $data=request()->except('_token');
        // dd($data);
        $res=rp::where(['rp_id'=>$data['rp_id']])->update($data);
        if($res){
            return redirect('admin/role_perm_index');
        }
    }

}
