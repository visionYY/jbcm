<?php

namespace App\Http\Controllers\University;

use App\Models\DX\Comment;
use App\Models\DX\Discussion;
use App\Models\User;
use App\Services\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:university',['except'=>['index','detail']]);
    }

    //议题
    public function index(){
        $discussion = Discussion::orderBy('time','desc')->get();
        foreach ($discussion as $disc){
            $disc->count = Comment::where('discussion_id',$disc->id)->count();
        }
//        dd($disc);
        return view('University.Discussion.index',compact('discussion'));
    }

    //评论议题
    public function content($id){
        $discussion = Discussion::find($id);
        $user = Auth::user();
//        dd($id);
        return view('University.Discussion.content',compact('discussion','user'));
    }

    //海报
    public function poster(){

        return view('University.Discussion.index');
    }
    //添加评论
    public function putContent(Request $request){
        //判断内容后给状态 先默认给1;
        $response = detection($request->content);
//        dd($response);
        if(200 == $response->code){
            $taskResults = $response->data;
            foreach ($taskResults as $taskResult) {
                if(200 == $taskResult->code){
                    $sceneResults = $taskResult->results;
                    foreach ($sceneResults as $sceneResult) {
                        $scene = $sceneResult->scene;
                        $suggestion = $sceneResult->suggestion;
                        //根据scene和suggetion做相关处理
                        if ($suggestion == 'block'){
                            return response(['code'=> '001','msg' => '评论涉嫌非法言论','content' => $request->content]);
                        }else{
                            $data['content'] = $request->content;
                            $data['discussion_id'] = $request->did;
                            $data['user_id'] = $request->uid;
                            $data['status'] = 1;
                        }
                    }
                }else{
                    return response(['code' => '004','msg' => "task process fail:" . $response->code]);
//                    print_r("task process fail:" + $response->code);
                }
            }
        }else{
            return response(['code' => '004','msg' => "detect not success. code:" . $response->code]);
//            print_r("detect not success. code:" + $response->code);
        }
        if (Comment::create($data)){
            return response(['code'=>'002','msg'=>'评论成功']);
        }else{
            return response(['code'=>'003','msg'=>'评论失败，稍后重试！']);
        }
    }

    //详情
    public function detail($id){
        $discussion = Discussion::find($id);
        $comment = Comment::where('discussion_id',$id)->orderBy('created_at','desc')->get();
        foreach($comment as $v){
            $user = User::find($v->user_id);
            $v->user_name = $user->nickname;
            $v->user_pic = $user->head_pic;
            $v->time = Helper::getDifferenceTime($v->created_at);
//            $reply =
        }
//        dd($comment);
        return view('University.Discussion.detail',compact('discussion','comment'));
    }
}
