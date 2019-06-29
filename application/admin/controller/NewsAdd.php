<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 19:37:25
 */

namespace app\admin\controller;
use think\Controller;

class NewsAdd extends Controller
{
    public function Index(){
        // 验证用户是否登录
        $UserId = session('UserId');
        if ($UserId === null)
        {
            return $this->error('请先登录', url('Login/index'));
        }
        $user=model("User");
        $User = $user->get_Name($UserId);
        $this->assign('User',$User);

        return view();
    }
}