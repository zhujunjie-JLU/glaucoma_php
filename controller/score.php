<?php
//获取微信的openid接口,由于微信修改了获取openid的方法
require_once "tool.php";
class score{
    public function run($request)
    {
        $errorReturn = array("status" => "fail", "errno" => "");
        $successReturn = array("status" => "success","score"=> "");
        if (!isset($request->get)
            || !isset($request->get["username"])) {
            $errorReturn["errno"] = "参数错误";
            return json_encode($errorReturn);
        }
        $username=$request->get["username"];
        $db=new \mtool\mysql();
        $res= $db->select("signTable",["score"],["username"=>$username]);
        $successReturn["score"]=$res[0]["score"]."";
        return json_encode($successReturn);
    }
}
