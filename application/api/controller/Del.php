<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 19:13:44
 */

namespace app\api\controller;
use think\Controller;

class Del extends Controller
{
    public function index(){
        // 验证用户是否登录
        $UserId = session('UserId');
        if ($UserId === null)
        {
            return $this->error('请先登录', url('Login/index'));
        }

        if(request()->isAjax()){
            $data=[
                'Memthodname'=>input('post.Memthodname'),
                'Id'=>input('post.Id')
            ];
            $arr_ture=array();
            $arr_ture['state']=1;
            $arr_ture_json=json_encode($arr_ture);

            $arr_false=array();
            $arr_false['state']=1;
            $arr_false_json=json_encode($arr_false);

            $message = model("Message");
            $column = model("Column");
            $user = model("User");
            if ($data['Memthodname'] == "delete")
            {
                //DELETE FROM Message WHERE M_ID={0}

                if ($message->Del($data['Id'])>0)
                {
                   echo $arr_ture_json;
                }
                else
                {
                    echo  $arr_false_json;
                }
            }
            else if ($data['Memthodname'] == "C_delete")
            {
                //DELETE FROM [Column] WHERE C_ID={0}", data.Id);
                if ($column->Del($data['Id']) > 0)
                {
                    echo $arr_ture_json;
                }
                else
                {
                    echo  $arr_false_json;
                }
            }
            else if ($data['Memthodname'] == "U_delete")
            {
                //DELETE FROM [db_lowvalue].[dbo].[User] WHERE U_ID={0}", data.Id);
                if ($user->Del($data['Id']) > 0)
                {
                    echo $arr_ture_json;
                }
                else
                {
                    echo  $arr_false_json;
                }
            }
        }
    }
}