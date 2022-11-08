<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Controllers\ControllerBase;
use App\Models\Userinfo;
use App\Library\check;
use LDAP\Result;

class createController extends ControllerBase
{
    public function indexAction()
    {
    }
    public function userAction($var)
    {
        $this->view->disable();
        if($var == 'create'){
            $req = $this->request->getRawBody();
            $arr = json_decode($req, true);
            $input = $arr['input'];
            $email = $input[0]['text_value'];
            $finding = Userinfo::find([
                "Uemail=:eml: limit 1",
                "columns"=> "id as sl, Uname as name, Uid as id, Uemail as email, Uphone as phone, Statuses as statuses,rolls",
                "bind" => [
                    "eml"=>$email
                ]
            ]);
            //$search_email = $finding[0]['email'];
            $json = json_encode($finding);
            $chk = new check($json);
            $obj = $chk->usercheck();
            if($obj['success'][0]==true){
                $Uid = date('YmdHis');
                $name = $input[1]['text_value'];
                $contact = $input[2]['text_value'];
                $password = password_hash($input[3]['text_value'], PASSWORD_DEFAULT);
                $rolls = $input[4]['text_value'];
                $detect = date('YmdHis');
                $con = $this->db->insertAsDict(
                    'userinfo',
                    [
                        "Uname"=>$name,
                        "Uid"=>$Uid,
                        "Uemail"=>$email,
                        "Uphone"=>$contact,
                        "Pass"=>$password,
                        "rolls"=>$rolls,
                        "detect"=>$detect,
                    ]
                );
                if(true == $con){
                    $obj =[
                        "success"=>[true, "Check your user info"],
                        "data"=>[
                            "name"=>$name,
                            "id"=>$Uid,
                            "email"=>$email,
                            "contact"=>$contact,
                            "rolls"=>$rolls,
                        ]
                    ];
                }else{
                    $obj = array("success"=>[0,"this vareable not define"]);
                }
            }else if($obj['success'][0]== true){
                $json = json_encode($obj);
            }
        }else{
            $obj = array("success"=>[0,"this vareable not define"]);
        }
        return json_encode($obj);
    }
    public function testAction()
    {
        $this->view->disable();
        echo "test is running";
       /* $con = $this->db->insertAsDict(
            'userinfo',
            [
                "Uname"=>"test",
                "Uid"=>"1212121211",
                "Uemail"=>"test@gmail.com",
                "Uphone"=>"0194055600000",
                "Pass"=>"72621527",
                "rolls"=>"admin",
                "detect"=>"1212121211",
                "powerBy"=>"admin"
            ]
        );
        print_r($con); */
    }
}