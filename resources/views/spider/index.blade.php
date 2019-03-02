<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>职位统计</title>
    <script src="http://blog.phpml.cn/js/echarts.common.min.js"></script>
</head>
<body>

    <div style="padding-top: 20px;padding-left: 20px;font-size: 20px;">

        <form action="" method="get">
            <span>来源选择&nbsp;</span>
            <select name="source" id="" style="font-size: 20px;">
                <option value="1"> 前程无忧 </option>
                <option value="2" <?php if($source == 2){ echo "selected";} ?> > 智联招聘 </option>
            </select>
            <input type="submit" value="切换" style="font-size: 18px;">
        </form>
    </div>
    <div id="wh" style="width:800px;height: 400px; margin:20px 0px" >

    </div>

    <div id="sh" style="width:800px;height: 400px;"></div>

    <div id="bj" style="width:800px;height: 400px;"></div>

    <div id="sz" style="width:800px;height: 400px;"></div>

</body>
<script>
    var optionWh = {
        title : {
            show: true,//默认为true，可以省略
            text: '武汉职位统计'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data: <?php echo $jobName;?>
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : <?php echo $dateArray;?>
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
        <?php  foreach($whArray as $k=>$v){ ?>
            {
                name: "<?=$k?>",
                type:'line',
//                stack: '总量',
                data: <?=json_encode($v)?>
            },
        <?php } ?>
        ]
    };
    var myChartWh = echarts.init(document.getElementById('wh'));
    myChartWh.setOption(optionWh);

    //上海岗位统计
    var optionSh = {
        title : {
            show: true,//默认为true，可以省略
            text: '上海职位统计'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data: <?php echo $jobName;?>
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : <?php echo $dateArray;?>
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
                <?php  foreach($shArray as $k=>$v){ ?>
            {
                name: "<?=$k?>",
                type:'line',
//                stack: '总量',
                data: <?=json_encode($v)?>
            },
            <?php } ?>
        ]
    };
    var myChartSh = echarts.init(document.getElementById('sh'));
    myChartSh.setOption(optionSh);


    // 北京岗位统计
    var optionBj = {
        title : {
            show: true,//默认为true，可以省略
            text: '北京职位统计'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data: <?php echo $jobName;?>
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : <?php echo $dateArray;?>
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
                <?php  foreach($bjArray as $k=>$v){ ?>
            {
                name: "<?=$k?>",
                type:'line',
//                stack: '总量',
                data: <?=json_encode($v)?>
            },
            <?php } ?>
        ]
    };
    var myChartBj = echarts.init(document.getElementById('bj'));
    myChartBj.setOption(optionBj);


    // 深圳岗位统计
    var optionSz = {
        title : {
            show: true,//默认为true，可以省略
            text: '深圳岗位统计'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data: <?php echo $jobName;?>
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : <?php echo $dateArray;?>
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
                <?php  foreach($szArray as $k=>$v){ ?>
            {
                name: "<?=$k?>",
                type:'line',
//                stack: '总量',
                data: <?=json_encode($v)?>
            },
            <?php } ?>
        ]
    };
    var myChartSz = echarts.init(document.getElementById('sz'));
    myChartSz.setOption(optionSz);

</script>
</html>
