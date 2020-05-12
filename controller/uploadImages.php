<?php
/**
 * Created by PhpStorm.
 * User: ASUS2
 * Date: 2019/12/3
 * Time: 9:42
 */
require_once "tool.php";
class uploadImages
{
    public function run($request)
    {
        //$db = new \mtool\mysql()
        date_default_timezone_set("Asia/Shanghai"); //设置时区
        if (isset($request->post)) {
           $userName =  $request->post["username"];
        }
        if (isset($request->post)) {
            $uploaded_file = $request->tmpfiles[0];
        }
        //move_uploaded_file($request->file["temp_name"],"/usr/");
        //echo $request->tempfiles[0];
        $user_path="/opt/tomcat/apache-tomcat-8.5.47/webapps/images/".$userName;

        if(!file_exists($user_path)) {
            //mkdir($user_path);
            mkdir($user_path,0777,true);
        }
        $date = date('Y-m-d H:i:s', time());
        $fileName = $date;
        $move_to_file=$user_path."/".$fileName;
        $user_pathToSql = "http://222.188.108.236:52123/images/".$userName."/".$fileName;
        if(move_uploaded_file ( $uploaded_file , $move_to_file )){
            $db=new \mtool\mysql();
            $res=$db->insert("imageTable",["image_name"=>$user_pathToSql,"image_user"=>$userName,"date"=>$date]);
            if($res){
                return true;
            }else{
                return false;
            }
        }
//            //判断该用户文件夹是否已经有这个文件夹

        // $code = $_FILES['file'];//获取小程序传来的图片
//        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
//            //把文件转存到你希望的目录（不要使用copy函数）
//            $uploaded_file=$_FILES['file']['tmp_name'];
//            $username = "min_img";
//            //我们给每个用户动态的创建一个文件夹
//            $user_path=$_SERVER['DOCUMENT_ROOT']."/m_pro/".$username;
//            //判断该用户文件夹是否已经有这个文件夹
//            if(!file_exists($user_path)) {
//                //mkdir($user_path);
//                mkdir($user_path,0777,true);
//            }
//
//            //$move_to_file=$user_path."/".$_FILES['file']['name'];
//            $file_true_name=$_FILES['file']['name'];
//            $move_to_file=$user_path."/".time().rand(1,1000)."-".date("Y-m-d").substr($file_true_name,strrpos($file_true_name,"."));//strrops($file_true,".")查找“.”在字符串中最后一次出现的位置
//            //echo "$uploaded_file   $move_to_file";
//            if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {
//                echo $_FILES['file']['name']."--上传成功".date("Y-m-d H:i:sa");
//
//            } else {
//                echo "上传失败".date("Y-m-d H:i:sa");
//
//            }
//        } else {
//            echo "上传失败".date("Y-m-d H:i:sa");
//        }
//    }
    }
}