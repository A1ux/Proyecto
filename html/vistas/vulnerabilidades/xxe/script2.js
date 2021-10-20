function XMLFunction(){
    var xml = '' +
    '<?xml version="1.0" encoding="UTF-8"?>'+
    '<root>' +
    '<email>' + $('#email').val() + '</email>' +
    '<password>' + $('#password').val() + '</password>' +
    '</root>';
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
    if(xmlhttp.readyState == 4){
        console.log(xmlhttp.readyState);
        console.log(xmlhttp.responseText);
        document.getElementById('errorMessage').innerHTML = xmlhttp.responseText;

    }
}
xmlhttp.open("POST","processmiti.php",true);
xmlhttp.send(xml);
};