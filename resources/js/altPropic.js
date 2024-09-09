const profilePropicEl = document.querySelector('#profile-wrapper div.profile-img');
const profileSpanEl = document.querySelector('#profile-wrapper .profile-img > span');
const headerPropicEl = document.querySelector('#app-header div.profile-img');
const headerSpanEl = document.querySelector('#app-header .profile-img > span');

const getAlternatePropic = function(name){
    return name.toUpperCase().charAt(0);
}

profileSpanEl.append(getAlternatePropic(profilePropicEl.getAttribute('data-nick')));
headerSpanEl.append(getAlternatePropic(headerPropicEl.getAttribute('data-name')));
