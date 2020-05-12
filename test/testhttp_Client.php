<?php

//创建Server对象，监听 10.211.55.15:9501端口
$serv = new swoole_server("0.0.0.0", 8082); // 10.211.55.15 是我们Swoole服务器地址
//监听数据接收事件
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    echo $data; //打印 接收到的数据
 //   $serv->send($fd, "I am swoole"); //发送字符串给客户端

  //  $serv->close($fd); // 注意：官方并不建议在这里关闭掉
	$serv->send($fd,$data);
});


//启动服务器
$serv->start();
