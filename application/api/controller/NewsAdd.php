<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 19:40:27
 */

namespace app\api\controller;
use think\Controller;

class NewsAdd extends Controller
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

        if(request()->isAjax()){
            $data=[
                'Memthodname'=>input('post.Memthodname'),
                'Title'=>input('post.Title'),
                'Content'=>input('post.Content'),
                'Label'=>input('post.Label')

            ];
            if ($data['Label'] == 0)
            {
                $M_Label = "时政";
            }else if ($data['Label'] == 1)
            {
                $M_Label = "娱乐";
            }else if ($data['Label'] == 2)
            {
                $M_Label = "生活";
            }else if ($data['Label'] == 3)
            {
                $M_Label = "财经";
            }else if ($data['Label'] == 4)
            {
                $M_Label = "军事";
            }else if ($data['Label'] == 5)
            {
                $M_Label = "科技";
            }
            $message=model("Message");
            if ($data['Memthodname'] == 0)
            {
                if ($message->Add($data['Title'],$data['Content'],$M_Label)){
                    echo $arr_ture_json;
                }else{
                    echo $arr_false_json;
                }
            }else if($data['Memthodname'] != 0){
                if ($message->Edit($data['Memthodname'],$data['Title'],$data['Content'])){
                    echo $arr_ture_json;
                }else{
                    echo $arr_false_json;
                }
            }

            }
    }
}