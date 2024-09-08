const propicEl = document.querySelectorAll('div.profile-img');
const nickname = propicEl.getAttribute('data-nick');

const getAlternatePropic = function(username){
    return username.toUpperCase().charAt(0);
}

propicEl.append(getAlternatePropic(nickname));
