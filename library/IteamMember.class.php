<?php

/**
 * Description of IteamMember
 * THIS CLASS INCLUDES ALL MEMBER ACTION.
 * @author Jeff Scott
 */

require 'IteamConnection.class.php';
require 'IteamObject.class.php';
class IteamMember extends IteamObject{

    public function register() {
        $conn = new IteamConnection();
        $conn->connectDatabase();
        $id = $this->makeId();
        $name = filter_input(INPUT_POST, 'una');
        $pwd = filter_input(INPUT_POST, 'pwd');
        $password = $this->encryptPsw($id, $pwd);
        $phonenumber = filter_input(INPUT_POST, 'tel');
        $email = filter_input(INPUT_POST, 'email');
        $time = $this->getCurrentTime();
        //print_r($_POST);
        $sql = "INSERT INTO `iteam`.`member` (`id`, `name`, `password`, `email`, `emailvalidate`, `phonenumber`, `phonevalidate`, `createDate`, `editDate`) "  . "VALUES ('$id', '$name', '$password', '$email', '0', '$phonenumber', '0', '$time', '$time');";
        $res = mysql_query($sql);
        if($res){
            $this->echoInformation("alert", "注册成功,请登录");
            $this->redirectPage("../?action=login");
        }
        else{
            $this->echoInformation("alert","注册失败,请检查您的输入后重新注册");
            $this->redirectPage("../?action=register");
        }
    }

    public function login() {
        
    }

    public function resetPassword() {
        
    }

    public function getId() {
        
    }

    public function editProfit() {
        
    }

    public function makeId() {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"
            $uuid = chr(123)// "{"
                    . substr($charid, 0, 8) . $hyphen
                    . substr($charid, 8, 4) . $hyphen
                    . substr($charid, 12, 4) . $hyphen
                    . substr($charid, 16, 4) . $hyphen
                    . substr($charid, 20, 12)
                    . chr(125); // "}"
            return $uuid;
        }
    }
    
    public function encryptPsw($id,$pwd){
        $str = $id.$pwd;
        $str = md5($str);
        return $str;
    }
    
    public function getCurrentTime(){
        date_default_timezone_set("PRC");
        return date("Y-m-d H:i:s",time());
    }

}
