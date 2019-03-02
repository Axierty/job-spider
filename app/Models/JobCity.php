<?php
/**
 * Created by PhpStorm.
 * User: zhenyu.pan
 * Date: 2018/3/13
 * Time: 14:40
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCity extends Model
{
    //自定义表名
    protected $table = 'sp_city';

    //关闭时间戳
    public $timestamps = false;


}