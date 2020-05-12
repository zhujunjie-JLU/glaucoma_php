<?php
require_once "tool.php";

class drug{

    public function run($request){
        $errorReturn=array("status"=>"fail","errno"=>"");
        $successReturn=array("status"=>"success","realname"=>"","diagnose"=>"","operateleft"=>"","surgeryleft"=>"","operateright"=>"","surgeryright"=>"","outhospday"=>"","log"=>[]);

        if(!isset($request->get)
            || !isset($request->get["username"])){
            $errorReturn["errno"]="参数错误";
            return json_encode($errorReturn);
        }
        $username=$request->get["username"];

        $db=new \mtool\mysql();

        $realname=$db->select("peoTable",["realname"],["username"=>$username]);
        $hospnum=$db->select("peoTable",["hospnum"],["username"=>$username]);
        $diagnose = $db->select("surgeryTable",["diagnose"],["username"=>$username]);
        $operateleft=$db->select("surgeryTable",["operateleft"],["username"=>$username]);
        $surgeryleft=$db->select("surgeryTable",["surgeryleft"],["username"=>$username]);
        $operateright=$db->select("surgeryTable",["operateright"],["username"=>$username]);
        $surgeryright=$db->select("surgeryTable",["surgeryright"],["username"=>$username]);
        $outhospday=$db->select("surgeryTable",["outhospday"],["username"=>$username]);

        $successReturn["realname"]=$realname[0]["realname"];
        $successReturn["hospnum"]=$hospnum[0]["hospnum"];
        $successReturn["diagnose"]=$diagnose[0]["diagnose"];
        $successReturn["operateleft"]=$operateleft[0]["operateleft"];
        $successReturn["surgeryleft"]=$surgeryleft[0]["surgeryleft"];
        $successReturn["operateright"]=$operateright[0]["operateright"];
        $successReturn["surgeryright"]=$surgeryright[0]["surgeryright"];
        $successReturn["outhospday"]=$outhospday[0]["outhospday"];

        $res=$db->selectNote($username);

        $successReturn["log"]=$res;
        return json_encode($successReturn);
    }
}
