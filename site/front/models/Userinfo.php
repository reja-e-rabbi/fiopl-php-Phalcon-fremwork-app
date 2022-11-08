<?php

class Userinfo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $uname;

    /**
     *
     * @var string
     */
    public $uid;

    /**
     *
     * @var string
     */
    public $uemail;

    /**
     *
     * @var string
     */
    public $uphone;

    /**
     *
     * @var string
     */
    public $about;

    /**
     *
     * @var string
     */
    public $pyament;

    /**
     *
     * @var string
     */
    public $pyamentInfo;

    /**
     *
     * @var string
     */
    public $dates;

    /**
     *
     * @var string
     */
    public $pass;

    /**
     *
     * @var string
     */
    public $statuses;

    /**
     *
     * @var string
     */
    public $rolls;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("main");
        $this->setSource("userinfo");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Userinfo[]|Userinfo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Userinfo|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
