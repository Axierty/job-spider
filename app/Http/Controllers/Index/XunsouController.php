<?php
/**
 * Created by PhpStorm.
 * User: zhenyu.pan
 * Date: 2018/2/5
 * Time: 15:49
 */
namespace App\Http\Controllers\Index;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use hightman\xunsearch;

/**
 * 迅搜用法
 * Class IndexController
 * @package App\Http\Controllers\Index
 */
class XunsouController extends Controller
{
    public function home()
    {
        //加载迅搜的sdk
        require_once '/usr/local/xunsearch/sdk/php/lib/XS.php';
        echo base_path();

        $xs = new \XS('demo');
        $index = $xs->index;

        $data = array(
            'pid' => 2, // 此字段为主键，必须指定
            'subject' => '哈哈哈哈测试的人在哪呢',
            'message' => '测试文档的内容部分',
            'chrono' => time()
        );

        // 创建文档对象
        $doc = new \XSDocument;
        $doc->setFields($data);

        //添加索引到数据库
        $res = $index->add($doc);

        var_dump($res);

    }

    public function test()
    {
        //加载迅搜的sdk
        require_once base_path('vendor/hightman').'/xunsearch/lib/XS.class.php';

        $xs = new \XS('demo'); // 建立 XS 对象，项目名称为：demo
        $search = $xs->search; // 获取 搜索对象

        $search->setLimit(5);
        $doc = $search->search('subject:测试');
        var_dump($doc);
    }

}