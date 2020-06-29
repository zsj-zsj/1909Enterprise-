<?php

function createTree($data,$parent_id=0){
    $newArray=[];
    foreach($data as $key=>$v){
        if($v['parent_id']==$parent_id){
            $newArray[$key] = $v;
            $newArray[$key]['child'] = createTree($data,$v['permission_id']);
        }
    }
    return $newArray;
}

?>