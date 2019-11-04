document.getElementById('btn_parse').addEventListener('click',parseData);

function parseData(){
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this);
        }
    };
    xhttp.open("GET", "note.xml", true);
    xhttp.send();
}
