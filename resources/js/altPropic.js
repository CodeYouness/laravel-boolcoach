const getAlternatePropic = function(name){
    return name.toUpperCase().charAt(0);
}

const headerPropicEl = document.querySelector('#app-header div.profile-img');
const headerSpanEl = document.querySelector('#app-header .profile-img > span');
headerSpanEl.append(getAlternatePropic(headerPropicEl.getAttribute('data-name')));

const profilePropicEl = document.querySelector('#profile-wrapper div.profile-img');
const profileSpanEl = document.querySelector('#profile-wrapper .profile-img > span');
profileSpanEl.append(getAlternatePropic(profilePropicEl.getAttribute('data-nick')));
