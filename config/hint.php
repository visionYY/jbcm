<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/7/20
 * Time: 15:23
 */

return [
    //设置提示信息
    'account_null'          => '账号不存在！',
    'password_error'        => '密码错误！',

    //上传限制 10M
    'images_size_big'       => 10000*1024,
    'images_type_error'     => '上传图片类型错误',
    'images_size_error'     => '上传图片大小超出允许范围',
    'images_null'           => '没有文件上传',
    'upload_failure'        => '上传失败',

    //增删改提示
    'add_success'           => '添加成功！',
    'add_failure'           => '添加失败！',
    'mod_success'           => '修改成功！',
    'mod_failure'           => '修改失败！',
    'del_success'           => '删除成功！',
    'del_failure'           => '删除失败！',
    'del_failure_exist'     => '删除失败,该层级下存在子级，请先删除子级后再试！',
    'password_error'        => '密码错误！',
    'password_two'          => '密码两次输入不一致！',
    'detail_null'           => '暂无详情，请在操作中添加！',
    'detail_exist'          => '详情已经存在，无需再添加！',
    'data_exist'            => '数据不存在！',

    'del_other'             => '暂不提供删除功能！',

    'video_exist'           => '视频位置地址不能为空',
    'href_exist'            => '其他位置跳转地址不能为空',
    'is_set'                => '该条已经设置',
    'set_suss'              => '设置成功！',
    'set_fail'              => '设置失败！',
    'cancel_suss'           => '取消成功！',
    'cancel_fail'           => '取消失败！',



    //设置固定数组
    'location'              => [1 => '首页视频广告位',
                                2 => '首页轮播广告位',
                                3 => '首页纵向小广告位',
                                4 => '我有嘉宾顶部广告位',
                                5 => '嘉宾大学顶部广告位',
                                6 => '嘉宾峰会顶部广告位'],
    //广告位设置
    'index_show_adv'        => 2,       //1:视频；2：轮播；
    //展示几条
    'show_num'              => 5,

    //截图比例(通用) 宽*高
    'scre_gm_width'   => 268,
    'scre_gm_height'  => 151,
    //输出比例(通用) 宽*高
    'opt_gm_width'   => 536,
    'opt_gm_height'  => 302,

];