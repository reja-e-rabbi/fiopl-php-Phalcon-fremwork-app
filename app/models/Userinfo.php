<?php
namespace App\Models;
class Userinfo extends \Phalcon\Mvc\Model
{
    public $id;
    public $uname;
    public $uid;
    public $uemail;
    public $uphone;
    public $about;
    public $pyament;
    public $pyamentInfo;
    public $dates;
    public $pass;
    public $statuses;
    public $rolls;
    public $detect;
    public $img;
    public function initialize()
    {
        $this->setSchema("main");
        $this->setSource("userinfo");
    }
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
