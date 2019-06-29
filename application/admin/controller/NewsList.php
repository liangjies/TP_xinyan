<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 17:44:22
 */

namespace app\admin\controller;
use think\Controller;

class newsList extends Controller
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