<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 22:13:29
 */

namespace app\api\controller;


class User
{
    public function Index(){
        // 验证用户是否登录
        $UserId = session('UserId');
        if ($UserId === null)
        {
            return $this->error('请先登录', url('Login/index'));
        }

        $user = model("User");
        $count = $user->count_User();
        $select = $user->select_User();

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