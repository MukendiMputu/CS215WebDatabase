
function getProfile() {
    var username = 'mukendi';

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
                if (xhttp.readyState == 4 && xhttp.status == 200){
                    var user = JSON.parse(xhttp.responseText);
                    document.getElementById().innerHTML = `<div class="">
                                                </div>`;
                }
    }
    xhttp.open('GET', 'https://api.github.com/users/'+username, true);
    xhttp.send();
}