<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 20:55:38
 */

namespace app\api\controller;
use think\Controller;

class ColOn extends Controller
{
    public function index(){
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

        if(request()->isAjax()) {
            $data = [
                'Id' => input('post.Id'),
                'On' => input('post.On'),
            ];
            if ($data['On'] == 1 || $data['On'] == 0)
            {
                //UPDATE [Column] SET [C_On] = 1 WHERE C_ID={0}", data.Id);
                $Col = model("Column");
                if($Col->Col_Change($data['On'],$data['Id'])){
                    echo $arr_ture_json;
                }else{
                    echo $arr_false_json;
                }

            }


        }
    }
}