<?php
/**
 * Created by PhpStorm.
 * User: qiyue
 * Date: 2020/4/22
 * Time: 14:36
 */
require_once "tool.php";

class all_comments{
    public function run($request){
        $errorReturn=array("status"=>"fail","errno"=>"");
        $successReturn=array("status"=>"success","log"=>[]);

        if(!isset($request->get)
            || !isset($request->get["username"])){
            $errorReturn["errno"]="参数错误";
            return json_encode($errorReturn);
        }
        $username=$request->get["username"];
        $db=new \mtool\mysql();
        $res=$db->selectComments($username);

        $successReturn["log"]=$res;
        return json_encode($successReturn);
    }
}