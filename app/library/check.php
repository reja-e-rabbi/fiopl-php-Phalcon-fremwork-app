<?php
namespace App\Library;

class check{
    public function __construct($json)
    {
        $this->json = json_decode($json,true);
    }
    public function log($obj)
    {
        switch (count($this->json)) {
            case 1:
                $pass= $this->json[0]["password"];
                $wellcomeMsg = "wellcome ".$this->json[0]["name"].", Loading.. ..";
                if($pass != null){
                    if (password_verify($obj['pass'], $pass)) {
                        $this->json[0]["password"] = "";
                        switch ($this->json[0]["rolls"]) {
                            case 'admin':
                                $arr = array(
                                    "success"=> [true,$wellcomeMsg]
                                );
                                break;
                            case 'manager':
                                $arr = array(
                                    "success"=> [true,$wellcomeMsg]
                                );
                                break;
                            case 'public':
                                $arr = array(
                                    "success"=> [true,$wellcomeMsg]
                                );
                            break;
                            case 'service-man':
                                $arr = array(
                                    "success"=> [true,$wellcomeMsg]
                                );
                                break;
                            case 'shop-ownar':
                                $arr = array(
                                    "success"=> [true,$wellcomeMsg]
                                );
                                break;
                            case 'ownar':
                                $arr = array(
                                    "success"=> [true,$wellcomeMsg]
                                );
                                break;
                            case 'mordarator':
                                $arr = array(
                                    "success"=> [true,$wellcomeMsg]
                                );
                                break;
                            default:
                                $arr = array(
                                    "success"=> [true,$wellcomeMsg]
                                );
                                break;
                        }
                    } else {
                        $arr = array(
                            "success"=> [false,"password Not matching"]
                        );
                    }
                }else{
                    $arr = array(
                        "success"=> [false,"password is null"]
                    );
                }
                break;
            case 0:
                $arr = array(
                    "success"=> [false,"Plese signup first"]
                );
                break;
            default:
                $arr = array(
                "success"=> [false,"something wrong I same email address but tow many accounts"]
                );
                break;
        }
        $arr["data"]=$this->json;
        return json_encode($arr);
    }
    public function usercheck()
    {
        switch (count($this->json)) {
            case 1:
                $arr = array("success"=>[false,"this email is allready exist plese login"]);
                break;
            default:
                $arr = array("success"=>[true,"success plese do it"]);
                break;
        }
        return $arr;
    }
}