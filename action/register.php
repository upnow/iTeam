<?php
    session_start();
    include_once '../library/IteamMember.class.php';
    $member = new IteamMember();
    $res = $member->register();

    