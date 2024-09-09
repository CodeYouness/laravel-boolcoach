const profilePropicEl = document.querySelector('#profile-wrapper div.alt-propic');
const spanEl = document.querySelector('.profile-img > span');

const getAlternatePropic = function(name){
    return name.toUpperCase().charAt(0);
}

spanEl.append(getAlternatePropic(profilePropicEl.getAttribute('data-nick')));
