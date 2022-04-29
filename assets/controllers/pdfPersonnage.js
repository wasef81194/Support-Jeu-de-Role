var form = document.querySelector("#personnageForm")
var send = document.querySelector("#generate")
var perso_id = document.querySelector("#perso_id").value
var clicked = 0;
var toSend = 0;
setTimeout(10000);
send.onclick = function() { clicked = 1};
form.addEventListener("submit" , function(){
    toSend = 1;
    if ( clicked && toSend ) {
       // window.open('/personnage/'+perso_id+'/generate');
    }
});
/*if(window.location.pathname == '/personnage/new'){
    console.log(window.location.pathname); 
    window.open('/test');
}*/

 
