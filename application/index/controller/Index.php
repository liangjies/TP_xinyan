<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        //$page =Request::instance()->param(‘page’);
        $page="";
        if($page==null)
            $page=1;
        //导航栏
        $column=model("Column");
        $column=$column->loadList();
        $this->assign('list',$column);

        //文章列表
        $contents=model("Message");
        $contents=$contents->getContents($page);
        $this->assign('contents',$contents);

        //随机推荐文章列表
        $random=model("Message");
        $random=$random->getRandom($page);
        $this->assign('random',$random);


        return $this->fetch();
    }

}
