document.getElementById('btn').addEventListener('click',parseData);

function parseData(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myFunction(this);
        }
    };
    xhttp.open("GET", "note.xml", true);
    xhttp.send();
}

function myFunction(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var table="<tr><th>nimi</th><th>ohjaaja</th><th>julkaisuvuosi</th><th>genre</th><th>ikäraja</th></tr>";
    var x = xmlDoc.getElementsByTagName("elokuva");
    for (i = 0; i <x.length; i++) { 
        table += "<tr><td>" +
        x[i].getElementsByTagName("nimi")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("ohjaaja")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("julkaisuvuosi")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("genre")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("ikäraja")[0].childNodes[0].nodeValue +
        "</td></tr>";
    }
    document.getElementById("xml_txt").innerHTML = table;
    }
     


