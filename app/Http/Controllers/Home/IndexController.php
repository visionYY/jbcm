<?php

namespace App\Http\Controllers\Home;

use App\Http\Resources\view;
use App\Models\Advertising;
use App\Models\Article;
use App\Models\Navigation;
use App\Models\Video;
use App\Services\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页
    public function index(){
        $data['title'] = '首页';

        //导航
        $navig = Navigation::orderBy('sort','desc')->orderBy('created_at')->get()->toArray();
        $data['navig'] = Helper::_tree_json($navig);

        //广告
        $data['adver'] = Advertising::get();

        //分类

        //推荐

//        dd($data);
        return view('Home.Index.index',compact('data',$data));
    }

    //转发
    public function transmit($oneId,$secId){
        switch ($oneId){
            case 2:
                //品牌节目
                return redirect('brand/oneId/'.$oneId.'/secId/'.$secId);
                break;
            case 5:
                //嘉宾大学
                return redirect('university/oneId/'.$oneId.'/secId/'.$secId);
                break;
            case 6:
                //嘉宾峰会
                return redirect('summit/oneId/'.$oneId.'/secId/'.$secId);
                break;
            case 3:
                //导师与学员
                return redirect('tutorStudent/oneId/'.$oneId.'/secId/'.$secId);
                break;
            case 4:
                //关于我们
                return redirect('aboutUs/oneId/'.$oneId.'/secId/'.$secId);
                break;
            default:
                //首页
                return redirect('/');
                break;
        }

    }

    public function brand($oneId,$secId){
        $data['title'] = '品牌节目';
        $data['secId'] = $secId;
        //导航
        $navig = Navigation::orderBy('sort','desc')->orderBy('created_at')->get()->toArray();
        $data['navig'] = Helper::_tree_json($navig);
        $data['towNav'] = Navigation::orderBy('sort','desc')->orderBy('created_at')->where('parent_id',$oneId)->get();
        foreach ($data['towNav'] as $twoNav) {
            if ($twoNav->id == 9) {
                //企业纪录片
                $twoNav->video = Video::orderBy('created_at')->where('nav_id', $twoNav->id)->limit(3)->get();
            } else {
                //其他文章部分
                $threeNav = Navigation::select('id', 'parent_id', 'n_name')->orderBy('sort', 'desc')->orderBy('created_at')->where('parent_id', $twoNav->id)->get();
                foreach ($threeNav as $art) {
                    $art->article = Article::orderBy('created_at')->where('nav_id', $art->id)->limit(3)->get();
                }
                $twoNav->threeNav = $threeNav;
            }
        }
        //我有嘉宾顶部广告位 9

//        dd($data);
        return view('Home.Index.brand',compact('data',$data));
    }

    public function university($oneId,$secId){
        echo '嘉宾大学';
    }

    public function summit($oneId,$secId){
        echo '嘉宾峰会';
    }

    public function tutorStudent($oneId,$secId){
        echo '导师与学员';
    }

    public function aboutUs($oneId,$secId){
        echo '关于我们';
    }
}
