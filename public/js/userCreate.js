import { stdio } from "../app/library/spark/module/stdio.js";
import { Valid } from "../app/library/spark/module/valid.js";
console.log('userCreate.js is active');
document.querySelector('.sub').addEventListener('click',funs);

function funs(e) {
    var att, std, vld, obj;
    att = e.target.getAttribute('data-id');
    switch(att.toLowerCase()){
        case 'create-user':
            obj ={
               "name":"create-user",
               "request":["ajax"],
               "class":"default",
               "input":[
                  {
                      "class":"email"
                  },
                  {
                      "class":"name-form"
                  },
                   {
                      "class":"tel-form-2"
                  },
                  {
                      "class":"password"
                  }
                ],
                "select":[
                    {
                        "class":"rolls-user"
                    }
                ]
            };
            vld = new Valid(obj);
            var chk = vld.check();
            var snd = JSON.stringify(chk);
            if(chk != undefined){
              if(chk.valid == true){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open(chk.method,chk.action+'/create',true);
                xmlhttp.getAllResponseHeaders('content-type','application/json');
                xmlhttp.onload = function(){
                    var result = this.response;
                    var arr = JSON.parse(result);
                    if(arr.success[0]==false){
                        document.querySelector('.'+obj.class).innerHTML = arr.success[1];
                    }else if(arr.success[0]==true){
                        var dat = arr['data'];
                        var li = `<ul><p>${arr.success[1]}</p>`;
                        for(var prop in dat){
                            li += `<li>${prop}: ${dat[prop]}</li>`;
                        }
                        li += `</ul>`;
                        document.querySelector('.'+obj.class).innerHTML = li;
                    }
                }
                xmlhttp.send(snd);
               }else if(chk.valid == false){
                   document.querySelector('.'+obj.class).innerHTML = chk.success[1];
               }
            }
            break;
        default:
            console.log('something wrong');
            break;
    }
}