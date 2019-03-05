<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class MqConsumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mq:consumer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 消费者
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        set_time_limit(0);
        $connection = new AMQPStreamConnection('118.25.103.12', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, true);

        $receiver = new self();
        #下面第四个参数如果为true表示开启确认模式，也就是消费以后会告知rabbitmq服务器该条消息已经处理完毕，这样可以方式消息处理一半挂掉了，结果服务器也删除了这条未处理完毕的消息
        $channel->basic_consume('hello', '', false, true, false, false, [$receiver, 'callFunc']);

        while(true) {
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }


    public function callFunc($msg)
    {
        echo " [x] Received ", $msg->body, "\n";
        if($msg->body==2){
            sleep(50);
        }else{
            sleep($msg->body);
        }

//        sleep(substr_count($msg->body, '.'));
        echo " [x] Done", "\n";
    }

}
