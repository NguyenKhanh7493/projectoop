<?php
class db {
    private $_conn;
    private $_result;
    private $host = 'location';
    private $username = 'root';
    private $pass = '';
    private $database = 'oop_demo';
    function __construct()
    {
        $this->connect();
    }

    public function connect() {
        if (!$this->_conn) {
            $this->_conn = mysqli_connect($this->host, $this->username, $this->pass, $this->database) or die('can`t connect database');
            mysqli_set_charset($this->_conn,'utf8');
        }
    }

    public function disConnect() {
        if ($this->_conn){
            mysqli_close($this->_conn);
        }
    }

    public function QuerySql($sql) {
        if ($this->_conn) {
            $this->_result = mysqli_query($sql);
        }
    }

    public function fetch($sql) {
        $this->QuerySql($sql);
        if ($this->_result) {
            $data = mysqli_fetch_assoc($this->_result);
        } else {
            $data = array();
        }
        return $data;
    }

    public function fetchAll($sql) {
        $this->QuerySql($sql);
        if ($this->_result) {
            while ($da = mysqli_fetch_assoc($this->_result)) {
                $data[] = $da;
            }
        } else {
            $data = array();
        }
        return $data;
    }
}
?>