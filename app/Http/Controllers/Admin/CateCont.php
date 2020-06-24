<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CateCont as cateinfo; 
use App\Model\Category;

class CateCont extends Controller
{
    public function create()
    {
        $category=Category::where(['is_del'=>1])->get();
        return view('admin.catecont.create',['category'=>$category]);
    }

    public function story(Request $request)
    {
        $data=$request->input();
        $data['time']=time();
        $res=cateinfo::insert($data);
        if($res){
            return $arr=[
                'msg'=>'ok',
                'code'=>0,
            ];
        }   
    }

    public function index()
    {
        $where=[];
        $title_name=request()->title_name;
        if($title_name){
            $where[]=['title_name','like',"%$title_name%"];
        }
        $res=cateinfo::where($where)->where(['is_dels'=>1])
                    
                    ->join('category','category.cate_id','=','cate_contents.cate_id')
                    ->orderBy('cate_contents.sort','desc')
                    ->paginate(3);
        $query=request()->all();
        return view('admin.catecont.index',['data'=>$res,'query'=>$query]);
    }

    public function del(Request $request)
    {
        $id=$request->id;
        $res=cateinfo::where(['id'=>$id])->update(['is_dels'=>2]);
        if($res){
            return $arr=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }
    
    public function edit()
    {
        $cate=Category::get();
        $id=request()->id;
        $data=cateinfo::where(['id'=>$id])->first();
        return view('admin.catecont.edit',['catename'=>$cate,'data'=>$data]);
    }

    public function upd()
    {
        $data=request()->input();
        $res=cateinfo::where(['id'=>$data['id']])->update($data);
        if($res){
            return $arr=[
                'msg'=>'ok',
                'code'=>0,
            ];
        }
    }

    public function isshow()
    {
        $data=request()->all();
        $res=cateinfo::where(['id'=>$data['id']])->update([$data['field']=>$data['value']]);
        if($res){
            return 'ok';
        }
    }

    public function changesort()
    {
        $data=request()->all();
        $res=cateinfo::where(['id'=>$data['id']])->update(['sort'=>$data['sort']]);
        if($res){
            return $arr=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }
}
