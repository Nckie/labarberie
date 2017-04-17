function msgok(msgState, jason, mail){
    "use strict";
    var p, msgValid, mail, btnSubmit;
    msgState.textContent = "";
    btnSubmit = document.querySelector('.js-submit-nl');

    p = document.createElement('p');
    msgValid = msgState.appendChild(p);
    
    msgValid.innerHTML = jason.msg;
    msgValid.className = 'valid';
    
    mail.value = '';
    btnSubmit.disabled = true;
    
    if(btnSubmit.disabled = true) {
        btnSubmit.classList.add('disabled');
    }
}

function msgnope(msgState, jason, mail){
    var p, msgValid, mail, btnSubmit;    
    msgState.textContent = "";

    p = document.createElement('p');
    msgValid = msgState.appendChild(p);
    
    msgValid.innerHTML = jason.msg;
    msgValid.className = 'valid';
}

function submitNl(){
    var msgState, formdata, mail, xhr;
    msgState = select('.msg-nl');
    mail = select('.js-mail-nl');
    xhr = new XMLHttpRequest();
    formdata = new FormData();
    formdata.append( "email", mail.value );
        
    console.log(formdata);

    xhr.open( "POST", "api/newsletter.php" );
    
    xhr.onload = function getResponse(res){
        log("ajax ok");
        var jason = JSON.parse(this.responseText);
//        msgValidation(msgState, jason, mail);

        if(jason.error == null){
            msgok(msgState, jason, mail);
        }else{
            msgnope(msgState, jason, mail);
        }
    }

    xhr.onerror = function getError(err){
        log("il semblerait que ça n'ai pas marché");
        log(err);
    };	

    xhr.send( formdata );
}