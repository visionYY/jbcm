<?php

namespace App\Http\Controllers\Home;

use App\Models\Advertising;
use App\Models\Navigation;
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


}
