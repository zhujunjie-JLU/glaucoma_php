<?php
// use Swoole\Http\Server;
// $http = new Server("0.0.0.0",9501); 实例化例子

$http = new swoole_http_server("0.0.0.0",8083);
$http->on('request', function ($request, $response) {
     print_r($request->get);
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
   //如果 需要在响应中显示 参数 就必须 把数组 转化为json数组  json_encode  $response->end("json_encode($request->get)")
});
$http->start();
