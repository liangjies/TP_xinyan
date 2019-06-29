<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 20:46:29
 */

namespace app\api\controller;
use think\Controller;

class Col extends Controller
{
    public function index(){
        // 验证用户是否登录
        $UserId = session('UserId');
        if ($UserId === null)
        {
            return $this->error('请先登录', url('Login/index'));
        }


        if(request()->isPost()) {
            $data = [
                'Memthodname' => input('post.Memthodname'),
                'C_ID' => input('post.Id'),
                'C_Order' => input('post.Order'),
            ];
            if ($data['Memthodname'] == "down") {
                //select top 1 [C_Order] from [db_lowvalue].[dbo].[Column] WHERE C_Order<{0} order by C_Order desc", data.Order);
                //sqlread(sql);
                $Col = model("Column");
                $Col->Col_Down($data['C_ID'],$data['C_Order']);
            }elseif ($data['Memthodname'] == "up"){
                $Col = model("Column");
                $Col->Col_Up($data['C_ID'],$data['C_Order']);
            }
        }


        $Col = model("Column");
        $count = $Col->count_Col();
        $select = $Col->select_Col();

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