<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 22:23:51
 */

namespace app\admin\controller;
use think\Session;

class Logout
{
    public function Index(){
        Session::delete('UserId');
        echo '<script language="JavaScript">;alert("退出成功！");location.href="/index";</script>;';
    }
}