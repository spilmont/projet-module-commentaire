/**
 * Created by sstienface on 25/01/2019.
 */

function ajaxCall(params)
{
    if(params)
    {

        var url = params.url;
        var parameters = '?';
        for(var i in params.parameters)
        {
            parameters+=Object.keys(params.parameters[i])[0]+"="+params.parameters[i][Object.keys(params.parameters[i])[0]];
        }

        url+=parameters;

        var xhttp = new XMLHttpRequest();

        // Affichage de l'information de chargement

        document.getElementById('start').innerHTML = "<div>Chargement en cour ...</div>";

        xhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                document.getElementById('start').innerHTML = "";
                var json = JSON.parse(this.responseText);

                switch(params.parameters[0].action)
                {
                    case"affProducts":

                        for(var i in json)
                        {
                            var div = document.createElement('div');
                            div.innerHTML = "<h1>"+json[i].username+" envoyer le "+json[i].date+"</h1>";
                            div.innerHTML+= "<p>"+json[i].commentaire+"</p>";
                            document.getElementById('cont-com').appendChild(div);

                        }

                        break;
                    default:
                        alert("Parametre non géré");
                        break;

                }


            }
        };

        xhttp.open("GET",url,true);

        xhttp.send();



        console.log("Sent an http request :"+url);


    }
}

document.getElementById('ajax').addEventListener('click', function()
{
    ajaxCall(
        {'url' : 'index.php',
            'parameters' : [
                {'action' : 'affProducts'}
            ]
        }
    );

});









