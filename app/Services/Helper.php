<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/7/26
 * Time: 9:59
 */

namespace App\Services;


use App\Models\Article;

class Helper
{
    //横向树形
    public static function _tree($arr,$pid=0,$level=0){
        static $tree = array();
        foreach ($arr as $v){
            if ($v['parent_id'] == $pid){
                $v['level'] = $level;
                $tree[] = $v;
                self::_tree($arr,$v['id'],$level+1);
            }
        }
        return $tree;
    }

    //树形
    public static function _tree_json($arr,$pid=0){
        $tree = array();
        foreach ($arr as $v){
            if ($pid == $v['parent_id']){
                $father['id'] = $v['id'];
                $father['text'] = $v['n_name'];
                $father['parent_id'] = $v['parent_id'];
                $father['sort'] = $v['sort'];
                $father['href'] = url('admin/navigation/'.$v['id']);
                $father['nodes'] = self::_tree_json($arr,$v['id']);
                $num = count($father['nodes']);
                $father['tags'] = ["$num"];
                $tree[] = $father;
            }
        }
        return $tree;
    }

    //获取最底层节点
    public static function getBottomLayer($arr){
        static $newArr = array();
        foreach ($arr as $v){
            if(!$v['nodes']){
                //剔除首页跟导师学员,关于我们
                if ($v['parent_id'] != 3 && $v['parent_id'] != 4){
                    $newArr[] = $v;
                }
            }else{
               self::getBottomLayer($v['nodes']);
            }
        }
        return $newArr;
    }

    //检查视频地址
    public static function checkVideoLocal($url){
        $arr = explode(':',$url);
        if ($arr[0] != 'https'){
            $arr[0] = 'https';
        }
        $str = implode(':',$arr);
        return $str;
    }

    //判断时间
    public static function getDifferenceTime($date){
        $time = strtotime($date);
        $difference = time() - $time;
        if ($difference < 60*60){
            $diff = floor($difference/60);
            $diffTime = $diff.'分钟前';
        }elseif($difference > 60*60 && $difference < 60*60*24){
            $diff = floor($difference/3600);
            $diffTime = $diff.'小时前';
        }else{
            $diffTime = substr($date,0,10);
        }
        return $diffTime;
    }








}

?>

