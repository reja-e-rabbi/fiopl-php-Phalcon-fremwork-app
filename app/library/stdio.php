<?php
namespace App\Library;
class stdio{
    public function __construct()
    {
        if(isset($_COOKIE['salt'])){
            $this->salt = json_decode($_COOKIE['salt'],true);
        }else{
            $this->salt = null;
            $this->user = null;
        }
    }
    public function cookieCheck()
    {
        var_dump($this->salt);
        var_dump($this->salt['name']);
        echo $this->user;
    }
}