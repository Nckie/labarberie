function btnMedia(){
    var btnHor, btnDes, i;
    
    btnHor = selectAll('.hor');
    btnDes = selectAll('.des');
    
    for(i=0; i<btnHor.length; i+=1){
        btnHor[i].onclick = showTextHor;
        btnDes[i].onclick = showTextDes;
    }
}

function showTextHor(){
    var textHor, cible, content;
    
    removeActive();
    textHor = selectAll('.hiddenTextHor');
    cible = Number(this.getAttribute('data-cible'));
    content = textHor[cible];
    content.classList.toggle('is-active');
}

function showTextDes(){
    var textDes, cible, content;
    
    removeActive();
    textDes = selectAll('.hiddenTextDes');
    cible = Number(this.getAttribute('data-cible'));
    content = textDes[cible];
    content.classList.toggle('is-active');
}

function removeActive() {
  var elems = document.querySelector(".is-active");
      if(elems !==null){
       elems.classList.remove("is-active");
      }
}


