<?php
/**
 * Created by PhpStorm.
 * User: zhenyu.pan
 * Date: 2018/3/13
 * Time: 14:17
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobNum extends Model
{
    //自定义表名
    protected $table = 'sp_job_num';

    //关闭时间戳
    public $timestamps = false;


}