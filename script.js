//Scroll Effects
window.addEventListener('scroll', reveal);
function reveal(){
    var reveals = document.querySelectorAll('.reveal');

    for(var i = 0; i < reveals.length; i++){
        var windowHeight = window.innerHeight;
        var revealTop = reveals[i].getBoundingClientRect().top;
        var revealPoint = 60;
        if(revealTop < windowHeight - revealPoint){
            reveals[i].classList.add('active');
        }else{
            reveals[i].classList.remove('active');
        }
    }
}

//navigation
function nav(){
    let navigation = document.querySelector('.nav');

    navigation.style.display = "inline";
    navigation.classList.add('act');
}
let width = window.innerWidth;
if(width > 600){
    navigation.style.display = "none";
    navigation.classList.remove('act');
}
function navback(){
    let back = document.querySelector('.nav');

    back.style.display = "none";
    back.classList.remove('act');
}
