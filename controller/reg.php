<?php
//微信小程序用户绑定权限
require_once "tool.php";



class reg{
    public function run($request)
    {
        $errorReturn = array("status" => "fail", "errno" => "");
        $successReturn = array("status" => "success");

        if (!isset($request->get)
            || !isset($request->get["username"])
            || !isset($request->get["openid"])
            || !isset($request->get["formid"])
            || !isset($request->get["realname"])
            || !isset($request->get["hospnum"])
            || !isset($request->get["password"])) {
            $errorReturn["errno"] = "error parameter";
            return json_encode($errorReturn);
        }

        $openid=$request->get["openid"];
        $username=$request->get["username"];
        $formid=$request->get["formid"];
        $realname=$request->get["realname"];
        $hospnum=$request->get["hospnum"];
        $password=$request->get["password"];

        $db=new \mtool\mysql();
        //获取邀请码
        $res= $db->select("peoTable",[],["username"=>$username]);
        if(count($res)!=0){
            $errorReturn["errno"]="该手机号已被注册";
            return json_encode($errorReturn);
        }
        //$peoplename=$res[0]["pname"];
        //$rmid=$res[0]["rmid"];
        //$pr=$res[0]["pr"];
        //$pid=$res[0]["pid"];

        //$res=$db->select("rmTable",[],["rmid"=>$rmid]);
        //if(count($res)==0){
         //   $errorReturn["errno"]="邀请码错误,请联系管理员";
         //   return json_encode($errorReturn);
        //}

        //$db->delete("peoTable",["inv"=>$inv]);
        $res=$db->insert("peoTable",["openid"=>$openid,"password"=>$password,"username"=>$username,"formid"=>$formid,"realname"=>$realname,"hospnum"=>$hospnum]);
        if($res["affected_rows"]===0){
            return json_encode($errorReturn);
        }
        return json_encode($successReturn);
    }
}
