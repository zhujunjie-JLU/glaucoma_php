<?php
require_once "tool.php";

class gp
{
    public function run($request)
    {
        $errorReturn = array("status" => "fail", "errno" => "");
        $successReturn = array("status" => "success", "people" => []);
        if (!isset($request->get)
            || !isset($request->get["username"])) {
            $errorReturn["errno"] = "参数错误";
            return json_encode($errorReturn);
        }

        $username=$request->get["rmid"];

        $db=new \mtool\mysql();
        //$res=$db->select("peopleTable",["pname","pr","pid"],[]);

        $rr=$db->select("peoTable",["realname","gender","username","hospnum"],[]);
        if($rr!=false) {
            foreach ($rr as $x) {
                $res[] = [
                    "realname" => $x["realname"],
                    "gender" => $x["gender"],
                    "username" => $x["username"],
                    "hospnum" => $x["hospnum"],
                ];
            }
        }
        $successReturn["people"]=$res;
        return json_encode($successReturn);
    }
}
