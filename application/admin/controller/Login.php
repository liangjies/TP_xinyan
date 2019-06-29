<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 12:30:08
 */

namespace app\admin\controller;
use think\console\command\make\Model;
use think\Request;
use think\Controller;
use \think\Validate;
class Login extends Controller
{
    public function index()
    {
        return view();
    }
    public function login()
    {
        // 接收post信息
        if(request()->isAjax()){
            $data=[
                'username'=>input('post.username'),
                'password'=>input('post.password')
            ];
        }
        //$postData = Request::instance()->post();

        $validate = new Validate([
            'username'  => 'require|max:25',
            'password' => 'require'
        ]);
        if (!$validate->check($data )) {
            $this->error($validate->getError());
        }else{
            $user=model("User");
            if($user->check_login($data)==1){
                session('UserId', $user->get_ID($data));
                $this->success("登录成功",url('/admin/index'));

            }else{
                $this->error("用户名或密码错误");
            }
        }

    }
}