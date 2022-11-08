<?php
declare(strict_types=1);
namespace App\controllers;
use App\Controllers\ControllerBase;
use App\Models\Userinfo;
use App\Library\check;
class UserController extends ControllerBase{
    public function IndexAction()
    {
    }
    public function logAction()
    {
    }
    public function checkAction()
    {
        $this->view->disable();
        if($this->request->isPost()==true){
            $arr = json_decode($this->request->getRawBody(),true);
            $email = $arr["input"][0]["text_value"];
            $pass = $arr["input"][1]["text_value"];
            $obj = array(
                "email"=>$email,
                "pass"=>$pass
            );
            $finding = Userinfo::find([
            "Uemail=:eml: limit 1",
            "columns"=> "id as sl,Uname as name,Uid as id,Uemail as email,Uphone as phone,About,Pyament,PyamentInfo,Dates,Pass as password,Statuses as statuses,rolls",
            "bind" => [
                "eml"=>$email
            ]
            ]);
            $output = json_encode($finding);
            $chk = new check($output);
            $transfer= $chk->log($obj);
            $this->cookies->set('salt',$transfer,time()+3600*24*7,'/');
            return $transfer;
        }
    }
    public function getAction($var)
    {
        $this->view->disable();
        switch ($var) {
            case 'out':
                $sa = $_COOKIE['salt'];
                if(isset($sa)){
                    $this->cookies->get('salt')->delete();
                    $this->response->redirect('user/log');
                }else{
                    $this->response->redirect('user/log');
                }
                break;
            case 'user-out':
                $arr = array(
                    "success"=>[false,"this action not success"]
                );
                echo "hallow world";
                break;
            default:
                echo "error logout";
                break;
        }

    }
    public function listAction($var)
    {
        //$this->view->disable();
        //echo "list action".$var;
        $target = $var;
        switch ($target) {
            case 'all-user':
                $lim = 30;
                $finding = Userinfo::find(array(
                    "columns"=> "id as sl, Uname as name, Uid as id, Uemail as email, Uphone as phone, About, Dates, Statuses as statuses,rolls, detect",
                    "order"=>"Dates DESC",
                    "limit" => $lim
                ));
                $all_group = Userinfo::find(array(
                    "columns"=> "count(rolls) as total, rolls",
                    "groupBy"=>"rolls"
                ));
                $arr = array(
                    "success"=>[true, "this quiry is exist"],
                    "value"=>$var,
                    "data"=>[
                        "data_list"=>$finding,
                        "data_group"=>$all_group
                    ]
                );
                $this->view->setVar('var', json_encode($arr));
                break;
            default:
                break;
        }
    }
}