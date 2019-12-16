<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="little.css">
    <title>kommentit</title>
    <h1>kommentit</h1>
</head>

<body>

        <script>
        function loadXmlDoc() {
            xmlhttp.onreadystatechange = function() {
     (this.readyState == 4 && this.status == 200) {
      myFunction(this);
        }
    };
xmlhttp.open("GET", "pankki.xml", true);
xmlhttp.send(); 
}
 function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>data</th><th>user</th></tr>";
  var x = xmlDoc.getElementsByTagName("comment");
  for (i = 0; i <x.length; i++) {
    table += "<tr><td>" +
    x[i].getElementsByTagName("data")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("user")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("demo").innerHTML = table;
}


        </script>
</body>
</html>