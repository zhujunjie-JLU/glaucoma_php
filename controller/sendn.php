<?php

require_once "tool.php";

class sendn{
    public function run($request){
        $errorReturn=array("status"=>"fail","errno"=>"");
        $successReturn=array("status"=>"success");
        // $this->create();
        if(!isset($request->get)
            || !isset($request->get["username"])
            || !isset($request->get["timesw"])){
            $errorReturn["errno"]="参数错误";
            return json_encode($errorReturn);
        }
        $timesw = $request->get["timesw"];
        echo $timesw;
        $db=new \mtool\mysql();
        $rr= $db->select("peoTable",["todrug","openid"],[]);
        if($rr != false){
            foreach ($rr as $x){
                $res=\mtool\getQRcode($x["todrug"],$x["openid"],$timesw);
            }
        }

        return json_encode($successReturn);
    }
}