<?php
/**
 * Created by PhpStorm.
 * User: zhenyu.pan
 * Date: 2017/8/30
 * Time: 13:25
 */
namespace App\Http\Controllers\Index;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
 * 关于排序的算法
 * Class IndexController
 * @package App\Http\Controllers\Index
 */
class SortController extends Controller
{

    private $sort_before = [3,12,2,5,8,10];


    /**
     * 冒泡排序 （变为 降序）
     * @步骤
     * 1. 数组 从顶部 到 底部，依次对比
     * 2. 每一轮对比
     */
    public function maopao($type = 0)
    {
        $arr = $this->sort_before;
         for($i = 0 ; $i < count($arr)-1 ; $i++){
            for($j = 0 ; $j < count($arr)-1-$i ; $j++){
                if($arr[$j] < $arr[$j+1]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $tmp;
                }
            }
         }
        if($type){
            return $arr;
        }else{
            dd($arr);
        }
    }


    /**
     * 二分查找 查找一个值 在数组中的位置
     */
    public function twoSearch($num = 8)
    {
        try{
            //获取一个 降序的数组
            $arr = $this->maopao(1);
            if(!in_array($num,$arr)){
                return "要查找的数值不再当前有序数组里面";
            }

            $low = 0;
            $high = count($arr) - 1;
            while($low <= $high){
                $middle = intval( ($low + $high)/2 );
                if($arr[$middle] == $num){
                    return "$num 在数组中的坐标为".$middle;
                }elseif( $arr[$low] > $num ){
                    $low ++;
                }else{
                    $high --;
                }

                return -1;
            }
        }catch (\exception $e){
            dd($e->getMessage());
        }

    }


    /**
     * 快速排序
     * @return array
     */
    public function quick()
    {
        $arr = $this->sort_before;

        function quick_sort($arr){
            if(!isset($arr[0])){
                return [];
            }
            if(count($arr) <= 1){
                return $arr;
            }
            $core = $arr[0];
            $left = [];
            $right = [];

            for($i = 1 ; $i < count($arr) ; $i++){
                if($arr[$i] < $core){
                    $left[] = $arr[$i];
                    continue;
                }else{
                    $right[] = $arr[$i];
                }
            }
            $left = quick_sort($left);
            $right = quick_sort($right);

            return array_merge( $left,[$core],$right);
        }

        return quick_sort($arr);

    }




}