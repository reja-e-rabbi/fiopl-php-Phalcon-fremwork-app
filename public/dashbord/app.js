import {stdio} from '../app/library/spark/module/stdio.js';

console.log('dashboard app js works');
class Dashbord extends stdio{
    static logout(e){
        /*var na, sa, rem;
        sa = this.getCookie('salt');
        if(sa != ''){
            var salt = JSON.parse(sa);
            (salt.name != undefined)||(salt.name != '')||(salt.name != null)? na = salt.name : na = null;
            var obj = {
                'remove':'cookie',
                'target':['salt',na]
            }
            rem = this.getRemove(obj);
            if(rem[0] != 0){
                console.log('yes remove');
            }
        }else{
            console.log('empty string');
        } */
        console.log('success....')
    }
}

Dashbord.logout();