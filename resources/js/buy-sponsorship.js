
const checkboxSponsorshipEls = document.querySelectorAll('.sponsorship-checkbox')
const buySponsorshipBtnEl = document.getElementById('buy-sponsorship-btn')

function getSelectedSponsorship() {
    let selectedValue = null;
    checkboxSponsorshipEls.forEach(checkbox => {
        if (checkbox.checked) {
            selectedValue = checkbox.value;
        }
    });
    return selectedValue;
}

function buySponsorship(event) {
    event.preventDefault();
    const selectedSponsorshipValue = getSelectedSponsorship();

    if (selectedSponsorshipValue) {
        console.log('Acquisto sponsorship con valore:', selectedSponsorshipValue);
    } else {
        console.log('Nessuna sponsorship selezionata.');
    }
}


buySponsorshipBtnEl.addEventListener('click', buySponsorship);
