<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Navigation;
use App\Models\Video;
use App\Services\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{


    //品牌节目数据获取
    public function getBrandMessge(Request $request){
        $nav = $request->get('nav');
        $page = $request->get('page');
        if($nav == 9){
            //企业纪录片
            $content = Video::getNavigation($nav,config('hint.m_show_num'),$page);
        }else{
            //其他内容
            $threeNav = Navigation::getNavTwo($nav);
            foreach ($threeNav as $v){
                $arrIds[] = $v->id;
            }
            $strIds = implode(',',$arrIds);
            $content = Navigation::getArticleVideo($strIds,config('hint.m_show_num'),$page);
            foreach ($content as $con){
                $con->publish_time = Helper::getDifferenceTime($con->publish_time);
                $thisNav = Navigation::find($con->nav_id);
                $con->nav_name = $thisNav->n_name;
                if($con->type ==1){
                    $con->url = url('mobile/article/id/'.$con->id);
                }else{
                    $con->url = url('mobile/video/id/'.$con->id);
                }
            }
        }
        return response($content);
    }
}
