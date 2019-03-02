<?php
/**
 * Created by PhpStorm.
 * User: zhenyu.pan
 * Date: 2017/8/26
 * Time: 18:02
 */


namespace App\Http\Controllers\Index;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
 * 前台模锟斤拷
 * Class IndexController
 * @package App\Http\Controllers\Index
 */
class IndexController extends Controller
{

    /**
     * 微锟斤拷锟斤拷页
     */
    public function index()
    {
        //返回的是查询对象
        $users = DB::select('select * from blog_user');

//        foreach ($users as $obj){
//            $ret[] = $obj->data;
//        }
//        var_dump($ret);

        return view('index/index',['name'=>'123','users'=>$users]);
        
    }


    /**
     * 查询出的对象如何变成数组
     * @param $obj
     * @return array|mixed|object|\stdClass
     */
    function obj2arr ($obj){
        return json_decode(json_encode($obj),true);
    }




}