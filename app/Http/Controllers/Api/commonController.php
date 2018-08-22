<?php

namespace App\Http\Controllers\Api;

use App\Services\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class commonController extends Controller
{
    //图像上传
    public function upload(Request $request){
        if($imgs = $request->file()){
            $keys = array_keys($imgs);
            $imgpath = Upload::uploadOne('Editor',$imgs[$keys[0]]);
            $res = array('errno'=>0,'data'=>array(asset($imgpath)));
            return response($res);
        }else{
            return response('没有图片上传 ');
        }
    }

    //图片删除
    public function imgDelete(Request $request){
        if ($imgurl= $request->post('url')){
             preg_match("/^(http:\/\/)?([^\/]+)/i", $imgurl, $matches);
             $imgstr = str_replace($matches[0],'',$imgurl);
             $res = unlink(public_path($imgstr));
             $data = array('code'=>2,$res);
        }else{
            $data = array('code' => 0,'msg' => '缺少参数url');
        }
        return response($data);
    }
}
