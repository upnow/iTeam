<?php

/* 
 * iTeam Project
 * You must abide by the copyright law of the people's Republic of China
 * and the protection of property right in your area,
 * and accept the terms of service of this website.
 * Without permit you are NOT allowed to modify this document. * 
 */

$time = time();
$time_md5 = md5($time);
echo "$time_md5<br/>";

function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
        return $uuid;
    }
}

$get = guid();
echo $get;