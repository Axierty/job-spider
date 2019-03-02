<?php
/**
 * Created by PhpStorm.
 * User: zhenyu.pan
 * Date: 2018/3/13
 * Time: 17:29
 */

/**
 * 获取日期数组
 * @修改说明 改为包含当天 这个日期 2017.06.21 改
 * @param $time 时间点 例如2016-10-18
 * @param int $num
 * @param int $type  获取的日期数组的类型 默认为value 为日期 type=2 => key 为日期 value 为0
 * @return array
 * @author panzhenyu
 * @time   2016.10.13
 */
function getDateArray($time,$num = 7,$type = 1){
    $arr=array();
    if($type == 1){
        for($i=1;$i<=$num;$i++){
            $arr[]=date('Y-m-d',strtotime($time)-($i-1)*24*60*60);
        }
    }elseif($type == 2){
        for($i=1;$i<=$num;$i++){
            $d=date('Y-m-d',strtotime($time)-($i-1)*24*60*60);
            $arr[$d] = 0;
        }
    }
    return $arr;
}