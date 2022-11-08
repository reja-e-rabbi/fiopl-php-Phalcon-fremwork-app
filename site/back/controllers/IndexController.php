<?php
declare(strict_types=1);
namespace Single\Controllers;
class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $a =2;
        if( $a ===1 ){
            return 'hallow world';
        }
    }

}

