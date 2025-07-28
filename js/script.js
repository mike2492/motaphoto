let modal = document.querySelector('#myModal');
let contactBtn = document.querySelector('.contact');
let closeBtn = document.querySelector('.close-btn');

contactBtn.onclick = function(){
    modal.style.display = 'block';
    document.body.style.overflowY = 'hidden';
}

closeBtn.onclick = function(){
    modal.style.display = 'none';
    document.body.style.overflowY = 'auto';
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
        document.body.style.overflowY = 'auto';
    }
}