let x = 1; 
let f = 1; //nopat
let kuvat = ["1.png", "2.png", "3.png", "4.png", "5.png", "6.png"];
let kerroin = [ ,1 ,2 ,3 ,4 ,5 ,6, 7, 8, 9, 10, 11, 12]; 
let pisteet = 0;
// var vuoronVaihto = false; 
// var pelaajat = ["Liisa", "Keke", "Maija", "Matti"];
// var pisteet = [0,67,0,0];

var pelaajat = [
  { nimi : "Liisa", pisteet : 0 }, 
  { nimi : "Keke", pisteet : 0 },
  { nimi : "Sami", pisteet : 0 },
  { nimi : "Emmi", pisteet : 0 }
];

var nopanHeitto = document.getElementById("noppa"); 
var valitseNumerot = document.getElementById("numerot"); 
var vuoro = 0;

function updateUi(){
  
  // Pelaajien näyttäminen
  let htmlPelaajat = "";
  for (let i=0; i<pelaajat.length; i++){
    htmlPelaajat += pelaajat[i].pisteet + "<br>";
    htmlPelaajat += pelaajat[i].nimi + "<br>";

  }

  document.getElementById("pelaajat").innerHTML = htmlPelaajat;

  document.getElementById("vuorossa").innerHTML = pelaajat[vuoro].nimi; 
   
  document.getElementById("noppaKuva").src = "./Kuva/" + kuvat[x-1];
  document.getElementById("toinenNoppa").src = "./Kuva/" + kuvat[f-1];

  document.getElementById("htmlPisteet").innerHTML = pisteet;
  document.getElementById("numerot").innerHTML = f + x;

}
  //näytä pisteet
      
    
  // Näytä pelaajat



function pelaaNappi() {
    
    x = Math.floor((Math.random() * 6) + 1);
    f = Math.floor((Math.random() * 6) + 1);
   
    
    pisteet = pisteet + x + f;
    
    if ("numerot"=1){

    }
    
    updateUi();
    
    
}

function vuoronVaihto(){
  pelaajat[vuoro].pisteet = pisteet;
  vuoro++;
  if (vuoro >= pelaajat.length){
    vuoro = 0;
    pisteet = 0;
  } 
  updateUi();
}

