<?php
/**
 * Created by PhpStorm.
 * User: zhenyu.pan
 * Date: 2018/3/12
 * Time: 17:01
 */
namespace App\Http\Controllers\Spider;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Models\JobNum;
use App\Models\JobCity;

class JobController extends Controller
{

    protected $city = [];
    protected $jobName = ['php','java','ios','android','前端'];

    public function __construct()
    {

    }


    /**
     * 前程无忧 工作数量爬去
     */
    public function qcSpider()
    {
        //获取城市数据
        $city = Db::table('sp_city')->get();

        if( $city ){
            foreach ($city as $k=>$v){
                $this->city[$k]['cityId'] = $v->id;
                $this->city[$k]['area'] = $v->qcArea;
            }
        }

        if( $this->city ){
            foreach( $this->city as $city){
                $jobName = $this->jobName;

                if( $jobName && is_array($jobName)){

                    foreach( $jobName as $j){

                        $url = "http://search.51job.com/list/{$city['area']},000000,0000,00,9,99,{$j},2,1.html?lang=c&stype=&postchannel=0000&workyear=99&cotype=99&degreefrom=99&jobterm=99&companysize=99&providesalary=99&lonlat=0%2C0&radius=-1&ord_field=0&confirmdate=9&fromType=&dibiaoid=0&address=&line=&specialarea=00&from=&welfare=";

                        $pattern = "/<div class=\"rt\">(.*?)(\d+)(.*?)<\/div>/ism";

                        $content = file_get_contents($url);
                        if( $content ){

                            preg_match_all($pattern,$content,$result);

                            $num = $result[2][0];

                            if( $num ){
                                $jobNumModel = new JobNum();
                                $jobNumModel->num = $num;
                                $jobNumModel->add_time = date('Y-m-d H:i:s');
                                $jobNumModel->source  = 1;
                                $jobNumModel->city_id  = $city['cityId'];
                                $jobNumModel->job_name = $j;

                                $jobNumModel->save();
                                continue;
                            }
                        }

                    }
                }
            }

            echo "爬去完毕";
        }else{
            echo "暂无城市数据";
        }


    }


    public function zlSpider()
    {

        //获取城市数据
        $city = Db::table('sp_city')->get();

        if( $city ){
            foreach ($city as $k=>$v){
                $this->city[$k]['cityId'] = $v->id;
                $this->city[$k]['name'] = $v->name;
            }
        }

        if( $this->city ) {
            foreach ($this->city as $city) {
                $jobName = $this->jobName;

                if ($jobName && is_array($jobName)) {

                    foreach ($jobName as $j) {

                        $url = "http://sou.zhaopin.com/jobs/searchresult.ashx?jl={$city['name']}&kw={$j}&sm=0&p=1";

                        $pattern = "/<span class=\"search_yx_tj\">(.*?)(\d+)(.*?)<\/span>/ism";

                        $content = file_get_contents($url);
                        if( $content ){

                            preg_match_all($pattern,$content,$result);
                            $num = $result[2][0];

                            if( $num ){
                                $jobNumModel = new JobNum();
                                $jobNumModel->num = $num;
                                $jobNumModel->add_time = date('Y-m-d H:i:s');
                                $jobNumModel->source  = 2;
                                $jobNumModel->city_id  = $city['cityId'];
                                $jobNumModel->job_name = $j;

                                $jobNumModel->save();
                                continue;
                            }
                        }
                    }
                }
            }
            echo "爬去完毕";
        }else{
            echo "暂无城市数据";
        }

    }
}