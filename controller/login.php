<?php
require_once "tool.php";
//登录接口
class login
{
    public function run($request){
        $errorReturn=array("status"=>"fail","errno"=>"");
        $successReturn=array("status"=>"success","username"=>"","realname"=>"");

        if(!isset($request->get)
        || !isset($request->get["username"])
        || !isset($request->get["password"])){
            $errorReturn["errno"]="参数错误";
            return json_encode($errorReturn);
        }

        $db=new \mtool\mysql();
        $username=$request->get["username"];
        $password=$request->get["password"];
        if (($request->get["formid"]) != "the formId is a mock one"){
            $formid = ($request->get["formid"])."/";
        }
        $openid=$request->get["openid"];
        $formiddoc=$db->select("peoTable",["formid"],["username"=>$username]);
        //$formid = $formiddoc[0]["formid"].$formid;
        $res=$db->select("peoTable",[],["username"=>$username,"password"=>$password]);
        if(count($res)!=0){

            //$res=$db->update("peoTable",["openid"=>$openid,"formid"=>$formid],["username"=>$username]);
            $ress=$db->update("peoTable",["openid"=>$openid],["username"=>$username]);
            $successReturn["realname"] = $res[0]["realname"];
            return json_encode($successReturn);
        };

        return json_encode($errorReturn);

/*
        if($rmid=="") {
            if ($res[0]["pr"] == '1') {
                //巡检不扫描登录
                $errorReturn["errno"]="请扫描对应的小程序码进入小程序";
                return json_encode($errorReturn);//返回空无权限
            }
        }elseif($rmid!=$res[0]["rmid"]){
            $errorReturn["errno"]="您无本机房的权限,请扫描正确的小程序码";
            return json_encode($errorReturn);//如果传入rmid则必须是匹配的rmid

        }
*/
/*
        $rmid=$res[0]["rmid"];
        $successReturn["rmid"]=$rmid;
        $successReturn["pname"]=$res[0]["pname"];

        //查找机房
        $successReturn["pr"]=$res[0]["pr"];
        $res=$db->select("rmTable",[],["rmid"=>$rmid,"available"=>"1"]);
        if(count($res)==0){
            $errorReturn["errno"]="机房错误,或机房已被删除";
            return json_encode($errorReturn);
        }
        $successReturn["rmname"]=$res[0]["rmname"];
        $successReturn["ban"]=$res[0]["ban"];

*/


    }


}
