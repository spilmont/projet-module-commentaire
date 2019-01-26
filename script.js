function ajaxRequest() {

    var xhttp = new XMLHttpRequest();



    xhttp.onreadystatechange = function () {


        if (this.readyState == 4 && this.status == 200) {

            document.getElementById('start').innerHTML = this.responseText;
            console.log(this.responseText);

           var json = JSON.parse(this.responseText);

           for( var i in json){

               var ent = document.createElement('div');
               ent.innerHTML = "<div id='ent' >"+json[i].username+" envoyer le "+ json[i].date+"</div> <div id='com'>"+json[i].commentaire+"</div>";
               document.getElementById('cont-com').appendChild(ent);




           }
        }









    };

        var user = document.getElementById('pseudo').value;
        var commentaire = document.getElementById('commentaires').value;
        xhttp.open("GET","index.php?user="+user+"&comment="+commentaire, true);
        xhttp.send();



}

document.getElementById('ajax').addEventListener("click", ajaxRequest);






