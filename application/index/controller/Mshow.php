<?php
/**
 * Created by PhpStorm.
 * User: liangjies
 * Date: 2019/6/29
 * Time: 10:45:35
 */

namespace app\index\controller;
use think\Request;
use think\Controller;
class Mshow extends Controller
{
    public function index()
    {
        //导航栏
        $column=model("Column");
        $column=$column->loadList();
        $this->assign('list',$column);

        try {
            // 获取传入ID
            $id = Request::instance()->param('id/d');

            // 判断是否成功接收
            if (is_null($id) || 0 === $id) {
                throw new \Exception('未获取到ID信息', 1);
            }else{
                $content=model("Message");
                $content=$content->getContent($id);
                $this->assign('content',$content);
                //dump($content);
                //return view();
                return $this->fetch();
            }

            // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

            // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}