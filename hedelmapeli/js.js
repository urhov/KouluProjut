var kuva1 = document.getElementById("kuva1");
var voittoKuva = document.getElementById("voittoKuva");
var hävisitKuva = document.getElementById("hävisitKuva"); 
var captionTeksti = document.getElementById("caption");
var laina = document.getElementById("haeLainaa");
let lukitus = false;
let lock1 = lock2 = lock3 = 0; 

let images = [ "paaryna.png", "kirsikka.png", "melooni.png", "avatar.png"];
let kertoimet = [ 2, 5, 10, 30];
let rahat = 45;
let panos = 1; 

let slot1 = 0;
let slot2 = 1; 
let slot3 = 2;
let avatar = 3; 

//span, joka sulkee modalin 
var span = document.getElementsByClassName("close")[0];

// kun käyttäjä painaa nappia 
function showModal(elemId){
    document.getElementById(elemId).style.display = "block";

}
function loseModal(){
    document.getElementById(elemId).style.display = "block"; 

}

function closeModal(elem){ 
    elem.parentElement.parentElement.style.display = "none"

}

// span.onclick = function() {
//     modaali.style.display = "none";
// }
// kun käyttäjä painaa jonnekkin ulos modalista, sulje

window.onclick = function(event){
    
    let modaali = event.target;
    if (modaali.id == "winModal" || modaali.id == "loseModal") {
        modaali.style.display = "none";
    }
    
}
// Panos
function asetaPanos(n) {
    panos = n;
    update();   
}   


function update (){

    document.getElementById("k1").src = "./IMG/" + images[slot1];
    document.getElementById("k2").src = "./IMG/" + images[slot2];
    document.getElementById("k3").src = "./IMG/" + images[slot3];

    document.getElementById("spanPanos").innerHTML = panos;
    document.getElementById("rahat").innerHTML = rahat;

    // Lukituksen kuvat
    if (lock1 == 0) {
        document.getElementById("lock1").src = "./IMG/lock.png"; 
    } 
    else {
        document.getElementById("lock1").src = "./IMG/lockv3.png"; 
    }
    if (lock2 == 0) {
        document.getElementById("lock2").src = "./IMG/lock.png";
    }
    else {
        document.getElementById("lock2").src = "./IMG/lockv3.png";
    }
    if (lock3 == 0){
        document.getElementById("lock3").src = "./IMG/lock.png";
    }
    else {
        document.getElementById("lock3").src = "./IMG/lockv3.png"; 
    }


   if (lock1 == 1) {
      lukitus == false; 
   } 
}
// Pelaa napin toiminta


function slot(){
{
    return Math.floor(Math.random()* images.length);

}
  {
    return Math.floor(Math.random()* images.length);
  }
   

}
function pelaaPainike() {
    
    rahat = rahat - panos;
    
    // Tutki ennen slot()-funktion kutsua onko slotti lukittu ja arvo vasta sitten kuva

    if (lock1 == 0) {
        slot1 = slot();
    }
        
    
    if (lock2 == 0) {
        slot2 = slot();
    }
        
    if (lock3 == 0) {
        slot3 = slot(); 
    }
    else {
        update();
    }
    update();

    if (lock1 == 1 || lock2 == 1 || lock3 == 1) { 
        lukitus = false;
        lock1 = 0;
        lock2 = 0; 
        lock3 = 0;
        update();
    }
    else {
        lukitus = true; 
    }

    tarkistaVoitto();      

} 
function haeLainaa() {
   
        rahat = rahat + 50;
        update(); 
        laina.style.display = "none";
        update();
    
        
}

/************************************ *
Lukituksen toiminta
***************************************/



function lukitse(j) {
    if (lukitus == false){ 
        return;
    }

    if (j == 1){
        if (lock1 == 0) {
            lock1 = 1;
        } else {
            lock1 = 0;
        }
    }
    
    if (j == 2){
        if (lock2 == 0) {
            lock2 = 1;
        } else {
            lock2 = 0;
        }
    }
    
    if (j == 3){
        
        if (lock3 == 0) {
            lock3 = 1;
        } else {
            lock3 = 0;
        }
    
    }
    
    
    update();
}

// Lukituspainikkeen kuvan vaihto
// function vaihdaKuva(elem) {
//      if (elem.dataset.lock == 'false')   { 
//         document.getElementById(elem.id).src = "./IMG/lockv3.png";
//         elem.dataset.lock = "true";
//     }
//     else {
//         document.getElementById(elem.id).src = "./IMG/lock.png"
//         elem.dataset.lock = "false"; 
//     }
// }

   //voiton tarkistus
   
function tarkistaVoitto(){
    if (slot1 == 0 && slot2 == 0 && slot3 == 0) {
       rahat = rahat + panos * kertoimet[0];
        update();
        showModal('winModal');
        lukitus = false; 
 }     
else if (slot1 == 1 && slot2 == 1 && slot3 == 1) {
    rahat = rahat + panos * kertoimet[1];
    update(); 
    showModal('winModal');
    lukitus = false;
}
else if (slot1 == 2 && slot2 == 2 && slot3 == 2) {
    rahat = rahat + panos * kertoimet[2];
 update(); 
 showModal('winModal');
 lukitus = false; 
}
   
  else if (slot1 == 3 && slot2 == 3 && slot3 == 3) {
    rahat = rahat + panos * kertoimet[3];
     update();
     showModal('winModal');
     lukitus = false; 
 }
else if (rahat <= 0) {
    update();
    showModal('loseModal');  
    lukitus = false;
}
else {
update();
}
}

    
