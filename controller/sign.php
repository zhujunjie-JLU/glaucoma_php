<?php
//微信小程序用户绑定权限
require_once "tool.php";



class sign{
    public function run($request)
    {
        $errorReturn = array("status" => "fail", "errno" => "");
        $successReturn = array("status" => "success","log" => []);

        if (!isset($request->get)
            || !isset($request->get["username"])
            || !isset($request->get["smonth"])) {
            $errorReturn["errno"] = "error parameter";
            return json_encode($errorReturn);
        }

        $username=$request->get["username"];
        $smonth="m".$request->get["smonth"];
        if (isset($request->get["todate"])){
            $todate=$request->get["todate"];
        }

        $db=new \mtool\mysql();
        //获取邀请码
        $res= $db->select("signTable",[$smonth],["username"=>$username]);
        $score=$db->select("signTable",["score"],["username"=>$username]);
        //签到时进入
        if(isset($request->get["todate"])){
            $signdate = $res[0][$smonth].$todate."/";

            $newscore= $score[0]["score"]+10;
            echo $newscore."检查".$score;
            $score=$db->update("signTable",["score"=>$newscore],["username"=>$username]);
            $res=$db->update("signTable",[$smonth=>$signdate],["username"=>$username]);
            $res=$db->select("signTable",[$smonth],["username"=>$username]);

        };
        $res = $res[0][$smonth];
        echo '签到记录'.$res;
        if(isset($res)){
            $res=explode("/",$res);
            $res11 = array_pop($res);
            $successReturn["log"] = $res;
        }

        return json_encode($successReturn);

    }
}