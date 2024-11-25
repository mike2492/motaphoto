let modal = document.getElementById("myModal");
let btnContact = document.querySelector('.contact > a');
let closeModal = document.querySelector('.close-modal');
let body = document.querySelector('body');

btnContact.onclick = function(){
    modal.style.display = "block";
    body.style.overflow = "hidden";
}

closeModal.onclick = function(){
    modal.style.display = "none";
    body.style.overflow = "visible";
}