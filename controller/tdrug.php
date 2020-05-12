<?php
//将今天用药存入数据库，为订阅消息作准备
require_once "tool.php";



class tdrug{
    public function run($request)
    {
        $errorReturn = array("status" => "fail", "errno" => "");
        $successReturn = array("status" => "success");

        if (!isset($request->get)
            || !isset($request->get["username"])
            || !isset($request->get["todrug"])) {
            $errorReturn["errno"] = "error parameter";
            return json_encode($errorReturn);
        }

        $username=$request->get["username"];
        $todrug=$request->get["todrug"];
        $db=new \mtool\mysql();
        $res=$db->update("peoTable",["todrug"=>$todrug],["username"=>$username]);
        return json_encode($successReturn);
    }
}