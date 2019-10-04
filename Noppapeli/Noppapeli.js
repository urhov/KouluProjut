let kuvat = ["1.png", "2.png", "3.png", "4.png", "5.png", "6.png"];
let kerroin = [ ,1 ,2 ,3 ,4 ,5 ,6]; 
let pisteet = 0;
// var pelaajat = ["Liisa", "Keke", "Maija", "Matti"];
// var pisteet = [0,67,0,0];

var pelaajat = [
  { nimi : "Liisa", pisteet : 0 }, 
  {nimi : "Keke", pisteet : 0 },
  {nimi : "Sami", pisteet : 0 },
  {nimi : "Emmi", pisteet : 0 }
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

  document.getElementById("vuorossa").innerHTML = vuoro = pelaajat[vuoro]; 
   
}
  //näytä pisteet
      
    
  // Näytä pelaajat



function pelaaNappi() {
    var x = Math.floor((Math.random() * 6) + 1);
    document.getElementById("numerot").innerHTML = x;
    document.getElementById("htmlPisteet").innerHTML = pisteet;
    document.getElementById("noppaKuva").src = "./Kuva/" + kuvat[x-1];
    pisteet = pisteet + x;
}
//  if (x = 1) {
//     pisteet = pisteet * kerroin [1];
//     updateUi();
//  }
//  else if (x = 2) {
//   pisteet = pisteet * kerroin [2];
//   updateUi();
// }
// else if (x = 3) {
//   pisteet = pisteet * kerroin [3];
//   updateUi();
// }
// else if (x = 4) {
//   pisteet = pisteet * kerroin [4];
//   updateUi();
// }
// else if (x = 5) {
//   pisteet = pisteet * kerroin [5];
//   updateUi();
// }
// else if (x = 6) {
//   pisteet = pisteet * kerroin [6];
//   updateUi();
// }





 
