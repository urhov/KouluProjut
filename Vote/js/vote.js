//vote.js
const pollQueryString = window.location.search;
console.log(pollQueryString);

const pollParams = new URLSearchParams(pollQueryString);

if (pollParams.has('id')){
    getPollData(pollParams.get('id'));
}

document.getElementById('optionsUl').addEventListener('click', giveVote);




function getPollData(id){
    console.log(id);
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        showPoll(data);
    }
    ajax.open("GET", "Backend/getPoll.php?id=" + id);
    ajax.send();
}
function showPoll(data){
    document.querySelector('h1').innerHTML = data.topic;
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

        newButton.appendChild(buttonText);
        newLi.appendChild(newButton);
        ul.appendChild(newLi);
    });
}

// give a vote for option 

function giveVote(event){
console.log(event.target.dataset.optionid);

let id = event.target.dataset.optionid;

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        
        if(data.hasOwnProperty('success')){
            showMessage('success', data.success);
        } else if(data.hasOwnProperty('warning')){
            showMessage('warning', data.warning);
        }


    }
    ajax.open("GET", "Backend/giveVote.php?id=" + id);
    ajax.send();
}

