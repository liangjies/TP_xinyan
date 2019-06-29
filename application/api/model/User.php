<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 16:00:23
 */
namespace app\api\model;
use think\Model;
class User extends  Model
{
    public function Del($U_ID){
        $where['U_ID'] = $U_ID;
        return $this->where($where)->delete();
    }
    public function get_Name($data){
        $where['U_ID'] = $data;
        $result = $this->field("U_User")->where($where)->find();
        return $result["U_User"];
    }
    public function select_User()
    {
        $result = $this->select();
        return $result;
    }
    public function count_User()
    {
        return $this->count();
    }
}