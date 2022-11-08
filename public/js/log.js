import {stdio} from '../app/library/spark/module/stdio.js';
import {Valid} from '../app/library/spark/module/valid.js';
console.log("log.js works");
document.querySelector(".check").addEventListener("click",test);
function test(e){
    var valid, obj, atbt;
    atbt = e.target.getAttribute("data-id");
    switch (atbt){
        case "login":
            obj = {
               "name":"login",
               "request":["ajax"],
               "class":"default",
               "input":[
                  {
                      "class":"email"
                  },
                  {
                      "class":"password"
                  }
                ]
            }
            break;
        case "signup":
            obj = {
               "name":"signup",
               "request":["html"],
               "class":"default",
               "input":[
                  {
                      "class":"name"
                  },
                  {
                      "class":"email"
                  },
                  {
                      "class":"password"
                  },
                  {
                      "class":"re-password"
                  },
                  {
                      "class":"submit"
                  }
                ]
            }
            break;
        default:
            console.log("data-id not active");
            break;
    }
    valid = new Valid(obj);
    var output= valid.check();
    var opt = JSON.stringify(output);
    if(output != undefined){
     if(output.valid==true){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open(output.method,output.action,true);
        xmlhttp.getResponseHeader('Content-Type','application/json');
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.querySelector('.'+obj.class).innerHTML= "check ..";
            }else if(xmlhttp.status==404){
                document.querySelector('.'+obj.class).innerHTML="connection error ...";
            }else if(xmlhttp.status==400){
                document.querySelector('.'+obj.class).innerHTML="bade request ...";
            }else if(xmlhttp.status==500){
                document.querySelector('.'+obj.class).innerHTML="Server not found ...";
            }else{
                document.querySelector('.'+obj.class).innerHTML="Some thin went wrong ...";
            }
        }
        xmlhttp.onload = function(){
            var result = this.response;
            var out = JSON.parse(result);
            if(out.success[0]==true){
                document.querySelector('.'+obj.class).innerHTML=out.success[1];
                var objSalt={
                    "name":'c'+Math.random().toString(36).substring(2,7),
                    "salt":[Math.floor(Math.random(1,9)*1000),Math.floor(Math.random(1,3)*100)]
                }
                var stdios = new stdio();
                stdio.setCookie("user",JSON.stringify(objSalt),1);
                window.location.replace('/dashbord/index/');
            }else if(out.success[0]==false){
                document.querySelector('.'+obj.class).innerHTML=out.success[1];
            }else{
                alert("some thing wront plese check this");
            }
        }
        xmlhttp.send(opt);
      }   
    }
}