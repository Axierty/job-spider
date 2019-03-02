<?php
/**
 * Created by PhpStorm.
 * User: zhenyu.pan
 * Date: 2018/3/13
 * Time: 16:21
 */
namespace App\Http\Controllers\Spider;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\JobNum;
use App\Models\JobCity;

/**
 * 表格展示 抓取的职位数量
 * Class IndexController
 * @package App\Http\Controllers\Spider
 */
class IndexController extends Controller
{

    protected $jobName = ['php','java','ios','android','前端'];

    public function index( Request $request)
    {
        $source = $name = $request->input('source');
        $source = ($source == '2')? 2 : 1;

        $dateArray = $this->getDateArray( date('Y-m-d') );
        $dateArray = array_reverse($dateArray);

        foreach( $this->jobName as $j ){

//            $tmp = Db::table('sp_job_num')->where(['city_id'=>1,'job_name'=>$j])
//                ->selectRaw("DATE_FORMAT(add_time,'%Y-%m-%d') as date,max(num) as num")
//                ->groupBy("DATE_FORMAT(add_time,'%Y-%m-%d')")
//                ->get()->toArray();

            $tmp = Db::select("SELECT DATE_FORMAT(add_time,'%Y-%m-%d') date,max(num) as num FROM `sp_job_num` WHERE city_id = 1 AND source = '".$source."' AND job_name = '".$j."' GROUP BY DATE_FORMAT(add_time,'%Y-%m-%d')");

            $wh = array_column($tmp,'num','date');

            foreach( $dateArray as $d ){
                foreach( $wh as $k=>$w ){

                    if( $d == date('Y-m-d',strtotime($k))){
                        $whArr[$d] = $w;
                        break;
                    }else{
                        $whArr[$d] = 0;
                        continue;
                    }
                }
            }

            $whArray[$j] = array_values($whArr);
        }


        
        foreach( $this->jobName as $j ){

            $tmp = Db::select("SELECT DATE_FORMAT(add_time,'%Y-%m-%d') date,max(num) as num FROM `sp_job_num` WHERE city_id = 2 AND source = '".$source."' AND job_name = '".$j."' GROUP BY DATE_FORMAT(add_time,'%Y-%m-%d')");

            $sh = array_column($tmp,'num','date');

            foreach( $dateArray as $d ){
                foreach( $sh as $k=>$w ){

                    if( $d == date('Y-m-d',strtotime($k))){
                        $shArr[$d] = $w;
                        break;
                    }else{
                        $shArr[$d] = 0;
                        continue;
                    }
                }
            }
            $shArray[$j] = array_values($shArr);


            //北京
            $tmpBj = Db::select("SELECT DATE_FORMAT(add_time,'%Y-%m-%d') date,max(num) as num FROM `sp_job_num` WHERE city_id = 4 AND source = '".$source."' AND job_name = '".$j."' GROUP BY DATE_FORMAT(add_time,'%Y-%m-%d')");
            $bj = array_column($tmpBj,'num','date');

            foreach( $dateArray as $d ){
                foreach( $bj as $k=>$w ){

                    if( $d == date('Y-m-d',strtotime($k))){
                        $bjArr[$d] = $w;
                        break;
                    }else{
                        $bjArr[$d] = 0;
                        continue;
                    }
                }
            }
            $bjArray[$j] = array_values($bjArr);


            //深圳
            $tmpSz = Db::select("SELECT DATE_FORMAT(add_time,'%Y-%m-%d') date,max(num) as num FROM `sp_job_num` WHERE city_id = 3 AND source = '".$source."' AND job_name = '".$j."' GROUP BY DATE_FORMAT(add_time,'%Y-%m-%d')");
            $sz = array_column($tmpSz,'num','date');

            foreach( $dateArray as $d ){
                foreach( $sz as $k=>$w ){

                    if( $d == date('Y-m-d',strtotime($k))){
                        $szArr[$d] = $w;
                        break;
                    }else{
                        $szArr[$d] = 0;
                        continue;
                    }
                }
            }
            $szArray[$j] = array_values($szArr);

        }



        $data['whArray'] = $whArray;
        $data['shArray'] = $shArray;
        $data['bjArray'] = $bjArray; 
        $data['szArray'] = $szArray; 


        $data['jobName'] = json_encode(array_values($this->jobName));
        $data['dateArray'] = json_encode(array_values($dateArray));
        $data['source'] = $source;

        return view('spider.index',$data);
    }



    public function getDateArray($time,$num = 7,$type = 1){
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



}