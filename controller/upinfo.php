<?php

require_once "tool.php";

class upinfo
{
    public function run($request){

        ini_set('date.timezone','Asia/Shanghai');
        $errorReturn=array("status"=>"fail","errno"=>"");
        $successReturn=array("status"=>"success");
        if(!isset($request->get)
            || !isset($request->get["username"])){
            $errorReturn["errno"]="参数错误";
            return json_encode($errorReturn);
        }

        $username=$request->get["username"];
        $birth=$request->get["birth"];
        $gender=$request->get["gender"];
        $marri=$request->get["marri"];
        $height=$request->get["height"];
        $weight=$request->get["weight"];
        $edu=$request->get["edu"];
        $job=$request->get["job"];
        $jobstat=$request->get["jobstat"];
        $income=$request->get["income"];
        $addr=$request->get["addr"];
        $livestat=$request->get["livestat"];
        $famicare=$request->get["famicare"];
        $health=$request->get["health"];
        $insurance=$request->get["insurance"];
        $diag=$request->get["diag"];
        $firstfind=$request->get["firstfind"];
        $confirm=$request->get["confirm"];
        $surgery=$request->get["surgery"];
        $drugtype=$request->get["drugtype"];
        $drugfreq=$request->get["drugfreq"];
        $stopdr=$request->get["stopdr"];
        $stopres=$request->get["stopres"];
        $stopadd=$request->get["stopadd"];
        $changedr=$request->get["changedr"];
        $chdrres=$request->get["chdrres"];
        $chdrresadd=$request->get["chdrresadd"];
        $missdr=$request->get["missdr"];
        $missdres=$request->get["missdres"];
        $missdresadd=$request->get["missdresadd"];

        $db=new \mtool\mysql();
        //直接删除之前的巡检记录


        $res=$db->update("peoTable",[
            "birth"=>$birth,
            "gender"=>$gender,
            "marri"=>$marri,
            "height"=>$height,
            "weight"=>$weight,
            "edu"=>$edu,
            "job"=>$job,
            "jobstat"=>$jobstat,
            "income"=>$income,
            "addr"=>$addr,
            "livestat"=>$livestat,
            "famicare"=>$famicare,
            "health"=>$health,
            "insurance"=>$insurance,
            "diag"=>$diag,
            "firstfind"=>$firstfind,
            "confirm"=>$confirm,
            "surgery"=>$surgery,
            "drugtype"=>$drugtype,
            "drugfreq"=>$drugfreq,
            "stopdr"=>$stopdr,
            "stopres"=>$stopres,
            "stopadd"=>$stopadd,
            "changedr"=>$changedr,
            "chdrres"=>$chdrres,
            "chdrresadd"=>$chdrresadd,
            "missdr"=>$missdr,
            "missdres"=>$missdres,
            "missdresadd"=>$missdresadd,
        ],[
            "username"=>$username,
            ]
            );
        if($res===false){
            $errorReturn["errno"]="update error";
            return json_encode($errorReturn);
        }

        return json_encode($successReturn);

    }
}
