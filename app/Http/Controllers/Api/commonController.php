<?php

namespace App\Http\Controllers\Api;

use App\Models\Navigation;
use App\Models\Sms;
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

    //搜索数据
    public function getSearch(Request $request){
        $keybord = $request->get('keybord');
        $source = $request->get('source');
        $page = $request->get('page');
        if ($source==1){
            //web端
            $show = config('hint.show_num');
        }elseif($source==2){
            //移动端
            $show = config('hint.m_show_num');
        }else{
            return response([]);
        }
        $res = Navigation::getSearch($keybord,$show,$page);
        if ($res){
            foreach ($res as $v){
                $nav = Navigation::find($v->nav_id);
                if ($nav){
                    $v->n_name = $nav->n_name;
                }else{
                    $v->n_name = '未知';
                }
                if($source==1){
                    if ($v->type ==1){
                        $v->url = url('article/id/'.$v->id);
                    }else{
                        $v->url = url('video/id/'.$v->id);
                    }
                }elseif($source==2){
                    if ($v->type ==1){
                        $v->url = url('mobile/article/id/'.$v->id);
                    }else{
                        $v->url = url('mobile/video/id/'.$v->id);
                    }
                }
            }
        }
        return response($res);
    }

    //测试发送短信
    public function getSms(){
//        ini_set("display_errors", "on"); // 显示错误提示，仅用于测试时排查问题
// error_reporting(E_ALL); // 显示所有错误提示，仅用于测试时排查问题
//        set_time_limit(0); // 防止脚本超时，仅用于测试使用，生产环境请按实际情况设置
//        header("Content-Type: text/plain; charset=utf-8"); // 输出为utf-8的文本格式，仅用于测试

// 验证发送短信(Sms)接口
        dd(Sms::send('17601635952','SMS_152880235',rand(1000,9999)));
    }


}
