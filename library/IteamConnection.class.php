<?php

class IteamConnection {

    private $hostname = 'localhost';
    private $user = 'root';
    private $password = 'JeffGAOfeng0532!@';
    private $database = 'iteam';
    private $link;

    public function connectDatabase() {
        $this->link = mysql_connect($this->hostname, $this->user, $this->password);
        mysql_select_db($this->database)
                or die(__FILE__ . '文件中数据库选择失败!');
        mysql_query("SET NAMES 'UTF8'"); //说明使用UTF8字符集
    }

    public function closeDatabase() {
        mysql_close($this->link);
    }

}
?>