<?php
/**
 * Created by PhpStorm.
 * User: ASUS2
 * Date: 2019/12/3
 * Time: 9:49
 */
require_once "tool.php";
class downloadImages
{
    function run($request){
        $successReturn=array("status"=>"success","log"=>[]);
        if (isset($request->post)) {
            $userName = $request->post["userName"];
        }
        $db=new \mtool\mysql();
        $res=$db->select("imageTable",["image_name","date"],["image_user"=>$userName]);
        $successReturn["log"]=$res;
        return json_encode($successReturn);
    }
}