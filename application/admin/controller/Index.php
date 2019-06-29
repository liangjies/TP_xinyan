<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Index extends Controller
{
    public function index()
    {
        // 验证用户是否登录
        $UserId = session('UserId');
        if ($UserId === null)
        {
            return $this->error('请先登录', url('Login/index'));
        }
        //Session::get('UserId');
        $user=model("User");
        $User = $user->get_Name($UserId);
        $this->assign('User',$User);
        return view();

    }
}
