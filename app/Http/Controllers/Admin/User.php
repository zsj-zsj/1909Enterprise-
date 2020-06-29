<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;
use App\Model\User as u;
use App\Model\RolePerm;

class User extends Controller
{
    public function reg()
    {
        $role=Role::get();
        return view('admin.user.reg',['role'=>$role]);
    }

    public function doreg()
    {
        $data=request()->input();
        $arr=[
            'user_name'=>$data['user_name'],
            'role_id'=>implode(',',$data['role_id']),
            'pwd'=>password_hash($data['pwd'],PASSWORD_BCRYPT)
        ];
        $res=u::insert($arr);
        if($res){
            return $d=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }

    public function login()
    {
        return view('admin.user.login');
    }

    public function dologin()
    {
        $data=request()->input();
        $res=u::where(['user_name'=>$data['user_name']])->where(['u_del'=>1])->first();
        if($res){
            $pwd=password_verify($data['pwd'],$res['pwd']);
            if($pwd){
                $res['perm']=RolePerm::join('permission','permission.permission_id','=','rolepermission.permission_id')
                                    ->where(['role_id'=>$res['role_id']])->where(['is_del'=>1])->get()->toArray();
                                    // dd($res['perm']);
                session(['user'=>$res]);
                return $arr=[
                    'msg'=>'登陆成功',
                    'code'=>0
                ];
            }else{
                return $arr=[
                    'msg'=>'密码不对',
                    'code'=>993
                ];
            }
        }else{
            return $arr=[
                'msg'=>'没有此用户',
                'code'=>12345
            ];
        }
    }

    public function quit()
    {
        session(['user'=>null]);
        echo "<script>alert('退出成功');location.href='/adlogin';</script>"; 
    }

    public function indexuser()
    {
        $data=u::join('role','role.role_id','=','user.role_id')->where(['u_del'=>1])->get();
        return view('admin.user.index',['data'=>$data]);
    }

    public function userdel()
    {
        $id=request()->id;
        $res=u::where(['user_id'=>$id])->update(['u_del'=>2]);
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
        $res=u::where(['user_id'=>$id])->first();
        $role=Role::get();
        return view('admin.user.edit',['data'=>$res,'role'=>$role]);
    }

    public function upd()
    {
        $data=request()->except('_token');
        $res=u::where(['user_id'=>$data['user_id']])->update($data);
        if($res){
            return redirect('admin/indexuser');
        }
    }

    public function updpass()
    {
        return view('admin.user.pass');
    }

    public function doupdpass()
    {
        $data=request()->except('_token');

        $res=u::where(['user_name'=>$data['user_name']])->first();
        if(!$res){
            echo "<script>alert('没有此用户');location.href='/admin/updpass';</script>"; 
        }
        if($data['pwd'] !=$data['pwd2'] ){
            echo "<script>alert('两次密码不一致');location.href='/admin/updpass';</script>"; 
        }

        $pwd=password_hash($data['pwd'],PASSWORD_BCRYPT);
        $a=u::where(['user_name'=>$data['user_name']])->update(['pwd'=>$pwd]);
        if($a){
            echo "<script>alert('修改成功');location.href='/main';</script>";  
        }
    }

}
