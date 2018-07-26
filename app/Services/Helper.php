<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/7/26
 * Time: 9:59
 */

namespace App\Services;


class Helper
{
    //
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
}