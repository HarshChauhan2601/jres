
const open = document.getElementById('open');
const close = document.getElementById('close');
const navbar = document.getElementById('nav');

const elementsToMove = document.getElementById('elementsToMove');

open.addEventListener('click', ()=> {
    // navbar.style.marginLeft="124%";
    // navbar.style.marginTop="0%";
    // navbar.style.position="absolute";
    // navbar.style.textAlign="center";
    // open.style.display="none";
    navbar.style.display="flex";
    navbar.style.marginTop="-7rem";
    navbar.style.width="90%";
    close.style.display="block";
    open.style.display="none";
    elementsToMove.style.display="none";
})

close.addEventListener('click', ()=> {
    navbar.style.display="none";
    open.style.display="block";
    close.style.display="none";
  
})
 