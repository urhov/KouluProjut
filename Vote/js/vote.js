//vote.js
const pollQueryString = window.location.search;
console.log(pollQueryString);

const pollParams = new URLSearchParams(pollQueryString);

if (pollParams.has('id')){


    getPollData(pollParams.get('id'));

}

function getPollData(id){
    console.log(id);
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
    }
    ajax.open("GET", "Backend/getPoll.php?id=" + id);
    ajax.send();
}
function showPoll(data){
    document.querySelector('h1').innerHTML = data[0].topic;
    const ul = document.getElementById('optionsUl');

    data['options'].forEach(option => {
        
        const newLi = document.createElement('li');
        newLi.classList.add('list-group-item');
        newLi.dataset.optionid = option.id;

        const newButton = document.createElement('button');
        newButton.classList.add('btn'); 
        newButton.classList.add('btn-lg');
        newButton.classList.add('btn-info');
        newButton.dataset.optionid = option.id;

       
        const buttonText = document.createTextNode(option.name);
        newbutton.appendChild(buttonText);
        newLi.appendchild(newButton);
        ul.appendChild(newLi);
    });
}

