<?php 

return [
    /*
    |--------------------------------------------------------------------------
    | 路由加载配置文件
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
 
    'base_url' => '',

    'index_url' => dirname($_SERVER['SCRIPT_NAME'])."/public/index/",
    'static_url' => dirname($_SERVER['SCRIPT_NAME'])."/public/index/",
]



?>