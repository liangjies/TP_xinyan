<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 17:50:48
 */

namespace app\api\model;
use think\Model;

class Message extends Model
{
    public function select_Post($keyword = null)
    {
        //$where['U_ID'] = $keyword;
        $keyword="";
        //$this->where('M_Content',['like','%$keyword%'])->select();
        $result = $this->where('M_Content','like','%'.$keyword.'%')->select();
        return $result;

    }
    public function count_Post($keyword = null)
    {
        //$where['U_ID'] = $keyword;
        $keyword="";
        //$this->where('M_Content',['like','%$keyword%'])->select();
        return $this->count();
    }
    public function Del($M_ID)
    {
        $where['M_ID'] = $M_ID;
        return $this->where($where)->delete();
    }
    public function Add($M_Title,$M_Content,$M_Label)
    {
        //Session::get('UserId');
        $user=model("User");
        $User = $user->get_Name($UserId);

        $data['M_Title'] = $M_Title;
        $data['M_Content'] = $M_Content;
        $data['M_Label'] = $M_Label;
        $data['M_Time'] = Date('Y-m-d H:i:s');
        $data['U_User'] = $User;
        return $this->data($data)->save();
    }
    public function Edit($M_ID,$M_Title,$M_Content)
    {
        $where['M_ID'] = $M_ID;
        $data['M_Title'] = $M_Title;
        $data['M_Content'] = $M_Content;
        return $this->where($where)->save($data);
    }

}