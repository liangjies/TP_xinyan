<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/28
 * Time: 23:45:01
 */

namespace app\index\model;
use think\Model;

class Column extends Model
{
    public function loadList(){
        //SELECT C_Link,C_Name FROM [Message] WHERE C_On=1 order by C_Order desc
        $where = array();
        $where['C_On'] = 1;
        return  $this->field("C_Link,C_Name")->where($where)->order("C_Order desc")->paginate();
    }
}