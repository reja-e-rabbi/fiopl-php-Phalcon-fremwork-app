export {stdio};
class stdio{
    static test(){
        console.log("stdio tested");
    }
  ajax(obj) {
      var output;
      var xmlhttp = new XMLHttpRequest();
    var out = xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        output= JSON.stringify(this.responseText);
      } else if (xmlhttp.status == 400) {
        output =0;
      }else if (xmlhttp.status == 403) {
        output =0;
      }else if (xmlhttp.status == 404) {
        output =0;
      }
        return output;
    };
    xmlhttp.open(obj.method, obj.link, true);
    if (obj.method == "GET") {
      xmlhttp.send();
    } else{
      xmlhttp.send("id="+obj);
    }
    return out;
  }
  static setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  static getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  static getRemove(obj){
      var output, remove, req, lnth;
      (obj.target != null)||(obj.target != undefined)? req=obj.target : req = null;
      (obj.remove != null)||(obj.remove != undefined)? remove=obj.remove : remove = null;
      (remove != null)||(obj.target.length != 0)? lnth = obj.target.length : lnth = 0;
      switch(remove){
          case 'cookie':
              for(var i=0;i<lnth;i++){
                  this.getCookie(req[i],' ',-1);
              }
              output =[1, 'success, next...'];
              break;
          case 'localstorage':
              break;
          case null:
              output =[0,'decler, which storage are you want remove'];
              break;
          default:
              output =[0,'decler, which storage are you want remove'];
              break;
      }
      return output;
  }
}