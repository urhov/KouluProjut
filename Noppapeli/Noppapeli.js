let kuvat = ["1.png", "2.png", "3.png", "4.png", "5.png", "6.png"];

var Pelaajat = ["pelaaja0", "pelaaja1", "pelaaja2", "pelaaja3"];
var nopanHeitto = document.getElementById("noppa"); 
var valitseNumerot = document.getElementById("numerot"); 


function Pelaajat() { 
  
}
function pelaaNappi() {
    var x = Math.floor((Math.random() * 6) + 1);
    document.getElementById("numerot").innerHTML = x;

    document.getElementById("noppaKuva").src = "./Kuva/" + kuvat[x-1];
}

 
//document.getElementById("s1").src = "s1" = 1; 
  //  document.getElementById("s2").src = "s2" = 2;
    //document.getElementById("s3").src = "s3" = 3;  
    //document.getElementById("s4").src = "s4" = 4; 
    //document.getElementById("s5").src = "s5" = 5; 
    //document.getElementById("s6").src = "s6" = 6; 

    //<img src="./Kuva/2.png" id="s2" alt="2 png">
    //<img src="./Kuva/3.png" id="s3" alt="3 png">
    //<img src="./Kuva/4.png" id="s4" alt="4 png">
    //<img src="./Kuva/5.png" id="s5" alt="5 png">
    //<img src="./Kuva/6.png" id="s6" alt="6 png">
    