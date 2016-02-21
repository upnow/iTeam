<?php

/**
 * Description of IteamObject
 * THIS CLASS IS A BASED CLASS, CAN ENFORCE ALL CLASS.
 * @author Jeff Scott
 */
class IteamObject {

    public function redirectPage($url) {
        echo "<meta http-equiv='refresh' content='0;url=$url' /> ";
    }

    public function echoInformation($type, $msg) {
        if ($type == "alert") {
            echo "<script language=javascript>alert('$msg');</script>";
        } else {
            echo "$msg";
        }
    }

}
