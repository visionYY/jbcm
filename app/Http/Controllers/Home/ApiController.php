<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //首页分类数据获取
    public function getIndexCate(Request $request){
        $cgid = $request->get('cgid');
        $page = $request->get('page');
        if ($page != null){
            $res = Article::getArticleVideo($cgid,config('hint.show_num'),$page);
        }else{
            $res = Article::getArticleVideo($cgid,config('hint.show_num'));
        }

        if($res){
            foreach ($res as $art){
                $nav = Navigation::find($art->nav_id);
                if ($nav->id == 1){
                    $art->n_name = '';
                }else{
                    $art->n_name = $nav->n_name;
                }

                if ($art->type==1){
                    $art->url = url('article/id/'.$art->id);
                }else{
                    $art->url = url('video/id/'.$art->id);
                }
                $art->cover = asset($art->cover);
            }
        }
        return response($res);
    }
}
