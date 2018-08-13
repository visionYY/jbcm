<?php

namespace App\Http\Controllers\Home;

use App\Http\Resources\view;
use App\Models\Advertising;
use App\Models\Article;
use App\Models\Category;
use App\Models\Choiceness;
use App\Models\Navigation;
use App\Models\Video;
use App\Services\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct(){
        date_default_timezone_set("Asia/Shanghai");
    }

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

    //品牌节目
    public function brand($oneId,$secId){
        $data['title'] = '品牌节目';
        $data['secId'] = $secId;
        //导航
        $navig = Navigation::orderBy('sort','desc')->orderBy('created_at')->get()->toArray();
        $data['navig'] = Helper::_tree_json($navig);
        //二级导航
        $data['towNav'] = Navigation::orderBy('sort','desc')->orderBy('created_at')->where('parent_id',$oneId)->get();
        foreach ($data['towNav'] as $twoNav) {
            if ($twoNav->id == 9) {
                //企业纪录片
                $twoNav->video = Video::orderBy('created_at')->where('nav_id', $twoNav->id)->limit(3)->get();
            } else {
                //其他文章部分
                $threeNav = Navigation::orderBy('sort', 'desc')->orderBy('created_at')->where('parent_id', $twoNav->id)->get();
                foreach ($threeNav as $art) {
                    $art->article = Article::orderBy('publish_time','desc')->where('nav_id', $art->id)->limit(3)->get();
                    foreach ($art->article as $v){
                        $cate = Category::find($v->cg_id);
                        $v->cg_name = $cate->cg_name;
                    }
                }
                $twoNav->threeNav = $threeNav;
            }
        }
        //我有嘉宾顶部广告位 9

//        dd($data);
        return view('Home.Index.brand',compact('data',$data));
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

    //三级列表
    public function threeList($pid,$id){
        $data['title'] = '列表';
        $data['id'] = $id;
        //导航
        $navig = Navigation::orderBy('sort','desc')->orderBy('created_at')->get()->toArray();
        $data['navig'] = Helper::_tree_json($navig);
        //三级导航
        $data['thrNav'] = Navigation::orderBy('sort','desc')->orderBy('created_at')->where('parent_id',$pid)->get();
        foreach ($data['thrNav'] as $thrNav){
            $thrNav->art = Article::where('nav_id',$thrNav->id)->orderBy('publish_time','desc')->get();
        }
//        dd($data);
        return view('Home.Index.threeList',compact('data',$data));
    }

    //文章详情
    public function article($id){
        $data['title'] = '文章详情';
        //导航
        $navig = Navigation::orderBy('sort','desc')->orderBy('created_at')->get()->toArray();
        $data['navig'] = Helper::_tree_json($navig);
        $data['article'] = Article::find($id);
        //当前导航
        $nav = Navigation::select('n_name')->find($data['article']->nav_id)->toArray();
        $data['article'] -> nav_name = $nav['n_name'];
        //当前分类
        $cate = Category::select('cg_name')->find($data['article']->cg_id)->toArray();
        $data['article'] -> cg_name = $cate['cg_name'];
        //时间
        $time = strtotime($data['article']->publish_time);
        $difference = time() - $time;
        if ($difference < 60*60){
            $diff = floor($difference/60);
            $data['article'] -> push = $diff.'分钟前';
        }elseif($difference > 60*60 && $difference < 60*60*60){
            $diff = floor($difference/3600);
            $data['article'] -> push = $diff.'小时前';
        }else{
            $data['article'] -> push = substr($data['article']->publish_time,0,10);
        }
        //上一篇，下一篇
        $data['prev'] = Article::prev($id,$data['article']->nav_id);
        $data['next'] = Article::next($id,$data['article']->nav_id);

        //编辑精选
        $data['choiceness'] = Choiceness::getThere();
        //猜你喜欢
        $data['like'] = Article::guessLike($data['article']->labels);
//        dd($data);
        return view('Home.Index.article',compact('data',$data));
    }
}
