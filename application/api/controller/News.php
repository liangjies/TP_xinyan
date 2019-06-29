<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 17:46:13
 */

namespace app\api\controller;
use think\Controller;

class News extends Controller
{
    public function index(){
        // 验证用户是否登录
        $UserId = session('UserId');
        if ($UserId === null)
        {
            return $this->error('请先登录', url('Login/index'));
        }

        $post = model("Message");
        $count = $post->count_Post();
        $select = $post->select_Post();

        $arr=array();
        $arr['code']=0;
        $arr['msg']="";
        $arr['count']=$count;
        $arr['data']=$select;
        $arr_json=json_encode($arr);

        echo $arr_json;
        //$json = '{"code":0,"msg":"","count":"'.$count.'; ","data":""}';
    }
}