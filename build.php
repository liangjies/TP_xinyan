<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__file__'  => ['hello.php','test.php'],
    // 定义index模块的自动生成
    'index2'   => [
        '__file__'   => ['tags.php', 'user.php', 'hello.php'],
        '__dir__'    => ['behavior', 'controller', 'model', 'view'],
        'controller' => ['Index', 'about', 'UserType'],
        'model'      => [],
        'view'       => ['index/index'],
    ],
    // 定义test模块的自动生成

];
