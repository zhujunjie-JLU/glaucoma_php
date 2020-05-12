<?php
/**
 * Created by PhpStorm.
 * User: qiyue
 * Date: 2020/4/22
 * Time: 20:33
 */
require_once "tool.php";



class reply{
    public function run($request)
    {
        $errorReturn = array("status" => "fail", "errno" => "");
        $successReturn = array("status" => "success");

        if (!isset($request->get)
            || !isset($request->get["id"])
            || !isset($request->get["reply"])) {
            $errorReturn["errno"] = "error parameter";
            return json_encode($errorReturn);
        }

        $id=$request->get["id"];
        $reply=$request->get["reply"];

        $db=new \mtool\mysql();


        $res=$db->update("commentTable",["reply"=>$reply,],["cid"=>$id]);

        if($res["affected_rows"]===0){
            return json_encode($errorReturn);
        }
        return json_encode($successReturn);
    }
}