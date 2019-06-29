<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 21:23:23
 */

namespace app\admin\model;
use think\Model;

class Column extends Model
{
    public function Add($C_Name,$C_Link,$C_Order){
        $data['C_Name'] = $C_Name;
        $data['C_Link'] = $C_Link;
        $data['C_Order'] = $C_Order;
        return $this->data($data)->save();;
    }
}