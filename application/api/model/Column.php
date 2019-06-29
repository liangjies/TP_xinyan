<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/28
 * Time: 23:45:01
 */

namespace app\api\model;
use think\Model;

class Column extends Model
{
    public function Del($C_ID){
        $where['C_ID'] = $C_ID;
        return $this->where($where)->delete();
    }
    public function count_Col()
    {
        return $this->count();
    }

    public function select_Col()
    {
        $result = $this->order("C_Order desc")->select();
        return $result;
    }
    public function Col_Change($C_On,$C_ID){
        $where['C_ID'] = $C_ID;
        $data['C_On'] = $C_On;
        return $this->where($where)->update($data);
        //UPDATE [Column] SET [C_On] = 1 WHERE C_ID={0}", data.Id);
    }
    public function Col_Down($C_ID,$C_Order){
        //select top 1 [C_Order] from [db_lowvalue].[dbo].[Column] WHERE C_Order<{0} order by C_Order desc", data.Order);
        $where['C_ID'] = $C_ID;
        $C_Order = $this->where('C_ID<'.$C_ID.'')->order("C_Order desc")->find();
        $C_Order = $C_Order['C_Order'];
        $data['C_Order'] =  $C_Order-1;
        return $this->where($where)->update($data);
    }
    public function Col_Up($C_ID,$C_Order){
        //select top 1 [C_Order] from [db_lowvalue].[dbo].[Column] WHERE C_Order<{0} order by C_Order desc", data.Order);
        $where['C_ID'] = $C_ID;
        $C_Order = $this->where('C_ID>'.$C_ID.'')->order("C_Order  ASC")->find();
        $C_Order = $C_Order['C_Order'];
        $data['C_Order'] =  $C_Order+1;
        return $this->where($where)->update($data);
    }
}