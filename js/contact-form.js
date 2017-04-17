function msgValidation(divOk, jason, valid, error){
    "use strict";
    var p, msgValid, removeTxt, name, mail, obj, msg;

    valid.textContent = '';
    error.textContent = '';

    p = document.createElement('p');
    msgValid = valid.appendChild(p);
    
    msgValid.innerHTML = jason.msg;
    msgValid.className = 'valid';
    
    name = byId('name');
    mail = byId('mail');
    obj = byId('object');
    msg = byId('msg');
    name.value = mail.value = obj.value = msg.value = '';
    
    msgValid.onclick = function(){
        this.remove(p);
    }
}

function msgError(divOk, jason, error){
    "use strict";
    log("c'est pas ok");
    var jasonErr, blockErr, p, msgErr;
    jasonErr = jason.error;

    error.textContent = '';

    for (var prop in jasonErr) { // Parcours un objet JS
        p = document.createElement('p');
        msgErr = error.appendChild(p);
        msgErr.innerHTML += jasonErr[prop] + "<br>" ;
        msgErr.className = "err";
    }


}

function submitForm(){
    var input, divOk, formdata, name, mail, obj, msg, xhr, form, error;
    input = byId('submit');
    divOk = byId('ok');
    name = byId('name');
    mail = byId('mail');
    obj = byId('object');
    form = byId('my_form');
    msg = byId('msg');
    error = select('.res');
    valid = select('.ok');
    xhr = new XMLHttpRequest();
    formdata = new FormData();
    
    console.log(formdata);

    formdata.append( "name", name.value );
    formdata.append( "mail", mail.value );
    formdata.append( "object", obj.value );
    formdata.append( "message", msg.value );
        
    xhr.open( "POST", "api/contact.php" );
    
    xhr.onload = function getResponse(res){
        log("ajax ok");
        var jason = JSON.parse(this.responseText);

        if(jason.error == null){
            msgValidation(divOk, jason, valid, error);
        }else{
            msgError(divOk, jason, error);
        }
    }

    xhr.onerror = function getError(err){
        log("il semblerait que ça n'ai pas marché");
        log(err);
    };	

    xhr.send( formdata );
}