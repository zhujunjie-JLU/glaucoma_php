<?php
//获取微信的openid接口,由于微信修改了获取openid的方法
require_once "tool.php";
class getinfo{
    public function run($request)
    {
        $errorReturn = array("status" => "fail", "errno" => "");
        $successReturn = array("status" => "success",
            "realname"=> "",
            "birth"=> "",
            "gender"=> "",
            "marri"=> "",
            "height"=> "",
            "weight"=> "",
            "edu"=> "",
            "job"=> "",
            "jobstat"=> "",
            "income"=> "",
            "addr"=> "",
            "livestat"=> "",
            "famicare"=> "",
            "health"=> "",
            "insurance"=> "",
            "diag"=> "",
            "firstfind"=> "",
            "confirm"=> "",
            "surgery"=> "",
            "drugtype"=> "",
            "drugfreq"=> "",
            "stopdr"=> "",
            "stopres"=> "",
            "stopadd"=> "",
            "changedr"=> "",
            "chdrres"=> "",
            "chdrresadd"=> "",
            "missdr"=> "",
            "missdres"=> "",
            "missdresadd"=> "");
        if (!isset($request->get)
            || !isset($request->get["username"])) {
            $errorReturn["errno"] = "参数错误";
            return json_encode($errorReturn);
        }
        $username=$request->get["username"];
        $db=new \mtool\mysql();
        $res= $db->select("peoTable",[],["username"=>$username]);
        $successReturn["realname"]=$res[0]["realname"]."";
        $successReturn["gender"]=$res[0]["gender"]."";
        $successReturn["birth"]=$res[0]["birth"]."";
        $successReturn["marri"]=$res[0]["marri"]."";
        $successReturn["height"]=$res[0]["height"]."";
        $successReturn["weight"]=$res[0]["weight"]."";
        $successReturn["edu"]=$res[0]["edu"]."";
        $successReturn["job"]=$res[0]["job"]."";
        $successReturn["jobstat"]=$res[0]["jobstat"]."";
        $successReturn["income"]=$res[0]["income"]."";
        $successReturn["addr"]=$res[0]["addr"]."";
        $successReturn["livestat"]=$res[0]["livestat"]."";
        $successReturn["famicare"]=$res[0]["famicare"]."";
        $successReturn["health"]=$res[0]["health"]."";
        $successReturn["insurance"]=$res[0]["insurance"]."";
        $successReturn["diag"]=$res[0]["diag"]."";
        $successReturn["firstfind"]=$res[0]["firstfind"]."";
        $successReturn["confirm"]=$res[0]["confirm"]."";
        $successReturn["surgery"]=$res[0]["surgery"]."";
        $successReturn["drugtype"]=$res[0]["drugtype"]."";
        $successReturn["drugfreq"]=$res[0]["drugfreq"]."";
        $successReturn["stopdr"]=$res[0]["stopdr"]."";
        $successReturn["stopres"]=$res[0]["stopres"]."";
        $successReturn["stopadd"]=$res[0]["stopadd"]."";
        $successReturn["changedr"]=$res[0]["changedr"]."";
        $successReturn["chdrres"]=$res[0]["chdrres"]."";
        $successReturn["chdrresadd"]=$res[0]["chdrresadd"]."";
        $successReturn["missdr"]=$res[0]["missdr"]."";
        $successReturn["missdres"]=$res[0]["missdres"]."";
        $successReturn["missdresadd"]=$res[0]["missdresadd"]."";
        return json_encode($successReturn);
    }
}
