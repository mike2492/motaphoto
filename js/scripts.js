let modal = document.querySelector('#myModal');
let btnClose = document.querySelector('.btn-close');
let btnContact = document.querySelector('.btn-contact > a');
let body = document.querySelector('body');

btnContact.onclick = function(){
    modal.style.display = 'block';
    body.style.overflow = 'hidden';
}

btnClose.onclick = function(){
    modal.style.display = 'none';
    body.style.overflow = 'auto';
}

window.onclick = function(event){
    if(event.target == modal){
        modal.style.display = 'none';
        body.style.overflow = 'auto';
    }
}