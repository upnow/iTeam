<?php

/*
 * iTeam Project
 * You must abide by the copyright law of the people's Republic of China
 * and the protection of property right in your area,
 * and accept the terms of service of this website.
 * Without permit you are NOT allowed to modify this document. * 
 */

/**
 * Description of IteamIndex
 *
 * @author Jeff Scott
 */
require 'IteamSession.class.php';

class IteamIndex extends IteamObject {

    public function __construct() {

        $action = filter_input(INPUT_GET, 'action');
        if (isset($action)) {
            //当浏览器接收到动作参数的时候
            if ($action === "register") {
                $this->registerInclude();
            } else if ($action === "login") {
                $this->loginInclude();
            } else if ($action === "nologin") {
                $this->nologinInclude();
            }
        } else {
            $session = new IteamSession();
        }
    }

    public function nologinInclude() {
        require './performance/nologin.phtml';
    }

    public function registerInclude() {
        require './performance/register.phtml';
    }

    public function loginInclude() {
        require './performance/login.phtml';
    }

    public function indexInclude() {
        require './performance/index.phtml';
    }

}
