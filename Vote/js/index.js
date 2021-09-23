// index-page js

window.addEventListener('load', getPolls);



/*get all poll from db and show on page*/
function getPolls(){
    console.log('haetaan data');
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        console.log(data);
        showPolls(data);
    }
    ajax.open("GET", "backend/getPolls.php");
    ajax.send();
}

function showPolls(data){

    const ul = document.getElementById("votesUL")

    data.array.forEach(poll => {
        const newLi = document.createElement('li');
        newLi.classList.add('list-group-item');

        const liText = document.createTextNode(poll.topic);
        newLi.appendChild(liText);

        ul.appendChild(newLi);
        /*
      <li class=list-group-item>
        kuka on paras?
      </li>
       */


    });
}