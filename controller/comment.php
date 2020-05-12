<?php
/**
 * Created by PhpStorm.
 * User: qiyue
 * Date: 2020/3/21
 * Time: 19:52
 */

//用户留言
require_once "tool.php";



class comment{
    public function run($request)
    {
        $errorReturn = array("status" => "fail", "errno" => "");
        $successReturn = array("status" => "success");

        if (!isset($request->get)
            || !isset($request->get["username"])
            || !isset($request->get["realname"])
            || !isset($request->get["time"])
            || !isset($request->get["comment"])) {
            $errorReturn["errno"] = "error parameter";
            return json_encode($errorReturn);
        }

        $username=$request->get["username"];
        $time=$request->get["time"];
        $realname=$request->get["realname"];
        $comment=$request->get["comment"];

        $db=new \mtool\mysql();


        $res=$db->insert("commentTable",["edittime"=>$time,"comment"=>$comment,"username"=>$username,"realname"=>$realname,"reply"=>"未回复"]);

        if($res["affected_rows"]===0){
            return json_encode($errorReturn);
        }
        return json_encode($successReturn);
    }
}
