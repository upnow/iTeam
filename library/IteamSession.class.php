<?php

/*
 * iTeam Project
 * You must abide by the copyright law of the people's Republic of China
 * and the protection of property right in your area,
 * and accept the terms of service of this website.
 * Without permit you are NOT allowed to modify this document. * 
 */

/**
 * Description of IteamSession
 *
 * @author Jeff Scott
 */
require 'IteamObject.class.php';
class IteamSession extends IteamObject{

    public function __construct() {
        if(isset($_SESSION)){
            echo "用户已登录";
        }
        else{
            $this->redirectPage("../?action=nologin");
        }
    }

}
