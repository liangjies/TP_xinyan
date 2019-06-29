<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 16:00:23
 */
namespace app\admin\model;
use think\Model;
class User extends  Model
{
    public function check_login($data){
        $where['U_User'] = $data["username"];
        $where['U_PWD'] = $data["password"];
        //$this->where($where)->select();
        if($this->where($where)->count()==1){
            return 1;
        }else{
            return 0;
        }
    }
    public function get_ID($data){
        $where['U_User'] = $data["username"];
        $result = $this->field("U_ID")->where($where)->find();
        return $result["U_ID"];
    }
    public function get_Name($data){
        $where['U_ID'] = $data;
        $result = $this->field("U_User")->where($where)->find();
        return $result["U_User"];
    }
}