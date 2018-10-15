<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Award;
use App\Models\Click;
use App\Models\LuckyDraw;
use App\Models\User;
use App\Models\Winners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MettingController extends Controller
{
    //年会抽奖
    public function luckyDraw(){
        $data = LuckyDraw::all();
        $open['status'] = 0;
        foreach ($data as $v){
            if ($v->status == 1){
                $open['id'] = $v->id;
                $open['status'] = 1;
                break;
            }
        }
        $open['uid'] = 1;
        $open['nickname'] = '像风一样自由';
        return view('Mobile.Metting.luckyDraw',compact('open',$open));
    }

    //登记领奖
    public function register(Request $request){
        $uid = $request->get('uid');

        return view('Mobile.Metting.register',compact('uid',$uid));
    }

    //登记成功
    public function doRegister(Request $request){
        $uid =  $request->post('uid');
        $data['truename'] =  $request->post('truename');
        $data['mobile'] =  $request->post('mobile');
        $data['address'] =  $request->post('address');
        User::find($uid)->update($data);
        $winner = Winners::where('user_id',$uid)->get();
        $award = Award::find($winner[0]->award_id);
        $award->uid = $uid;
//        dd($award);
        return view('Mobile.Metting.doRegister',compact('award',$award));
    }

    //我的奖品
    public function myAward($uid){
        $winner = Winners::where('user_id',$uid)->get();
        if ($winner){
            $data['status'] = 1;
            $data['winner'] = $winner[0];
            $data['award'] = Award::find($winner[0]->award_id);
            $data['user'] = User::find($uid);
        }else{
            $data['status'] = 0;
        }

//        dd($uid);
        return view('Mobile.Metting.myAward',compact('data',$data));
    }

    //
    public function clickOne(Request $request){
        $uid = $request->post('uid');
        $nickname = $request->post('nickname');
        $ld_id = $request->post('ld_id');
        $click = Click::find(1);
        $nowClick = $click->num+1;
        if ($nowClick % 2 == 0){
            //该场所有奖品
            $arawd = Award::where('ld_id',$ld_id)->where('num','>',0)->get()->toArray();
            //奖品抽完，该场次结束
            if (!$arawd){
                $res['code'] = 401;
                $res['msg'] = '已经结束';
                LuckyDraw::find($ld_id)->update(['status'=>0]);
            }
            //添加中奖名单
            $winner['user_id'] = $uid;
            $winner['nickname'] = $nickname;
            $winner['award_id'] = $arawd[0]['id'];
            $winner['award_name'] = $arawd[0]['name'];
            $winner['time'] = date('Y-m-d H:i:s',time());
            $winRes = Winners::create($winner);
            $arawdNum = $arawd[0]['num'] - 1;
            if ($winRes){
                //减奖品
                $awardRes = Award::find($arawd[0]['id'])->update(['num'=>$arawdNum]);
                if ($awardRes){
                    $res['code'] = 200;
                    $res['msg'] = '恭喜您中奖啦！';
                    $res['data'] = $arawd[0];
                    $res['uid'] = $uid;
                }else{
                    $res['code'] = 403;
                    $res['msg'] = '减奖品数目失败！';
                }
            }else{
                $res['code'] = 402;
                $res['msg'] = '添加中奖名单失败！';
            }
        }else{
            $res['code'] = 400;
            $res['msg'] = '未中奖';
        }
        $click->update(['num'=>$nowClick]);
        return response($res);
    }
}
