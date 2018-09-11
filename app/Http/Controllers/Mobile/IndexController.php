<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Advertising;
use App\Models\Article;
use App\Models\Category;
use App\Models\Navigation;
use App\Models\TutorStudent;
use App\Models\Video;
use App\Services\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页
    public function index(){
        $data['title'] = '我有嘉宾-遍访天下公司、纪录时代商业';

        //导航
        $data['navig'] = Navigation::getNav();

        //广告
        $data['ind_vid_adv'] = Advertising::getAdver(1,1);
        $data['ind_sil_adv'] = Advertising::getAdver(2,5);

        //分类
        $cate = Category::all()->toArray();
        $zuixin = array('id'=>0,'cg_name'=>'最新推荐',"sort"=>100,'status'=>1,'created_at'=>'2018-08-02 08:09:54','updated_at'=>'2018-08-02 08:09:54');
        array_unshift($cate,$zuixin);
        foreach ($cate as &$c){
            $c['content'] = Article::getArticleVideo($c['id'],config('hint.show_num'));
            foreach ($c['content'] as $cont){
                $nav = Navigation::find($cont->nav_id);
                if($nav['id'] == 1){
                    $cont->n_name = '';
                }else{
                    $cont->n_name = $nav->n_name;
                }
            }
        }
        $data['cate'] = $cate;
        //导师与学员
        $data['tutor'] = TutorStudent::getIndexShow();
        foreach ($data['tutor'] as $tutor){
            $tutor->classic_quote= explode('；',$tutor->classic_quote);
        }
//        dd($data);
        return view('Mobile.Index.index',compact('data',$data));
    }

    //重定向
    public function transmit($oneId,$secId){
        switch ($oneId){
            case 2:
                //品牌节目
                return redirect('mobile/brand/oneId/'.$oneId.'/secId/'.$secId);
                break;
            case 5:
                //嘉宾大学
                return redirect('mobile/university/oneId/'.$oneId.'/secId/'.$secId);
                break;
            case 6:
                //嘉宾峰会
                return redirect('mobile/university/oneId/'.$oneId.'/secId/'.$secId);
                break;
            case 3:
                //导师与学员
                return redirect('mobile/tutorStudent/oneId/'.$oneId.'/secId/'.$secId);
                break;
            case 4:
                //关于我们
                return redirect('mobile/aboutUs/oneId/'.$oneId.'/secId/'.$secId);
                break;
            default:
                //首页
                return redirect('mobile/index');
                break;
        }
    }

    //品牌节目
    public function brand($oneId,$secId){
        $data['title'] = '品牌节目';
        $data['secId'] = $secId;
        //导航
        $data['navig'] = Navigation::getNav();
        //二级导航
        $data['towNav'] = Navigation::getNavTwo($oneId);

        //内容
        foreach ($data['towNav'] as $towNav){
            if ($towNav->id == 9){
                //企业纪录片
                $towNav->content = Video::getNavigation($towNav->id,config('hint.m_show_num'));
            }else{
                //其他内容
                $threeNav = Navigation::getNavTwo($towNav->id);
                foreach ($threeNav as $v){
                    $arrIds[] = $v->id;
                }
                $strIds = implode(',',$arrIds);
                $towNav->content = Navigation::getArticleVideo($strIds,config('hint.m_show_num'));
                foreach ($towNav->content as $con){
                    $con->publish_time = Helper::getDifferenceTime($con->publish_time);
                    $thisNav = Navigation::find($con->nav_id);
                    $con->nav_name = $thisNav->n_name;
                }
            }
        }
        //我有嘉宾顶部广告位 4
        $data['adver'] = Advertising::getAdver(4,1);
//        dd($data);
        return view('Mobile.Index.brand',compact('data',$data));
    }

    //嘉宾大学
    public function university($oneId,$secId){
        echo '嘉宾大学';
    }

    //嘉宾峰会
    public function summit($oneId,$secId){
        echo '嘉宾峰会';
    }

    //导师与学员
    public function tutorStudent($oneId,$secId){
        echo '导师与学员';
    }

    //关于我们
    public function aboutUs($oneId,$secId){
        echo '关于我们';
    }
}
