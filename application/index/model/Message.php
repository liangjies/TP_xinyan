<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 10:22:26
 */

namespace app\index\model;
use think\Model;

class Message extends Model
{
    public function getContents($page){
        //SELECT TOP {0} M_ID,M_Title,CONVERT(varchar(10),M_Time, 120) as 'Date',M_Label FROM Message WHERE M_Time not in (SELECT top {1} M_Time FROM Message order by M_Time desc) order by M_Time desc", 10, Page* 10
        $num_rec_per_page=6;
        $start_from = ($page-1) * $num_rec_per_page;
        //$sql = "SELECT * FROM student LIMIT $start_from, $num_rec_per_page";
        $where = array();
        $where['C_On'] = 1;
        return  $this->field("M_ID,M_Title,M_Time,M_Label")->limit("$start_from $num_rec_per_page")->order("M_Time desc")->paginate();
    }
    public  function getRandom(){
        return $this->orderRaw('rand()')->limit('5')->paginate();
    }
    public function getContent($id){
        //SELECT TOP {0} M_ID,M_Title,CONVERT(varchar(10),M_Time, 120) as 'Date',M_Label FROM Message WHERE M_Time not in (SELECT top {1} M_Time FROM Message order by M_Time desc) order by M_Time desc", 10, Page* 10

        //$sql = "SELECT * FROM student LIMIT $start_from, $num_rec_per_page";
        $where = array();
        $where['M_ID'] = $id;
        return  $this->where($where)->paginate();
    }
}