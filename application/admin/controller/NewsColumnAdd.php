<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 21:12:13
 */

namespace app\admin\controller;


class NewsColumnAdd
{
    public function Index(){
        // 验证用户是否登录
        $UserId = session('UserId');
        if ($UserId === null)
        {
            return $this->error('请先登录', url('Login/index'));
        }

        $arr_ture=array();
        $arr_ture['state']=1;
        $arr_ture_json=json_encode($arr_ture);

        $arr_false=array();
        $arr_false['state']=1;
        $arr_false_json=json_encode($arr_false);

        // 接收post信息
        if(request()->isAjax()){
            $data=[
                'C_Name'=>input('post.title'),
                'C_Link'=>input('post.link'),
                'C_Order'=>input('post.order'),
            ];
            $Col = model("Column");
            if($Col->Add($data['C_Order'],$data['C_Link'],$data['C_Order'])){
                echo $arr_ture_json;
                return;
            }else{
                echo $arr_false_json;
                return;
            }
        }
        //$postData = Request::instance()->post();

        return view();
    }
}