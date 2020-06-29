<?php

namespace App\Http\Middleware;

use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=session('user');
        if(!$user){
            echo "<script>alert('请登录');location.href='/adlogin';</script>";die;
        }
        
        $path=$request->path();
     
        $route=0;
        $allRoute=['admin','head','left','main'];
        if(in_array($path,$allRoute)){
            $route=1;
        }else{
            foreach($user['perm'] as $k=>$v){
                if($v['url']==$path){
                    $route=1;
                    break;
                }
            }
            // dd($v['url']);
        }
        // dd($user['perm']);
        if(!$route){
            echo "<script>alert('没有权限');location.href='/main';</script>";die;
        }

        return $next($request);
    }
}
