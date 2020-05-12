<?php
/**
 * Created by PhpStorm.
 * User: qiyue
 * Date: 2020/4/22
 * Time: 16:44
 */
require_once "tool.php";

class all_com_doc{
    public function run($request){
        $successReturn=array("status"=>"success","log"=>[]);
        $username=$request->get["username"];
        $db=new \mtool\mysql();
        $res=$db->selectCom_doc();

        $successReturn["log"]=$res;
        return json_encode($successReturn);
    }
}