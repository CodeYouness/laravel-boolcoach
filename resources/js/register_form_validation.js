
const nameInputEl = document.getElementById('registration-form-name')
const nameInputElError = document.getElementById('registration-form-name-error')
nameInputEl.addEventListener('input', function() {
    const nameLength = nameInputEl.value.length;

    if (nameLength === 0){
        nameInputElError.innerHTML = '';
    }else if (nameLength < 3 || nameLength > 20) {
        nameInputElError.classList.add('text-danger')
        nameInputElError.innerHTML = 'Il nome deve essere compreso fra 3 e 20 caratteri';
    }else {
        nameInputElError.classList.remove('text-danger')
        nameInputElError.classList.add('text-success')
        nameInputElError.innerHTML = 'Campo valido!';
    }
});

const surnameInputEl = document.getElementById('registration-form-surname')
const surnameInputElError = document.getElementById('registration-form-surname-error')
surnameInputEl.addEventListener('input', function() {
    const surnameLength = surnameInputEl.value.length;

    if(surnameLength ===0){
        surnameInputEl.innerHTML = ''
    }
    else if (surnameLength < 3 || surnameLength > 20) {
        surnameInputElError.classList.add('text-danger')
        surnameInputElError.innerHTML = 'Il cognome deve essere compreso fra 3 e 20 caratteri';
    } else {
        surnameInputElError.classList.remove('text-danger')
        surnameInputElError.classList.add('text-success')
        surnameInputElError.innerHTML = 'Campo valido!';
    }
});

const nicknameInputEl = document.getElementById('registration-form-nickname')
const nicknameInputElError = document.getElementById('registration-form-nickname-error')
nicknameInputEl.addEventListener('input', function() {
    const nicknameLength = nicknameInputEl.value.length;

    if(nicknameLength === 0){
        nicknameInputElError.innerHTML = ''
    }
    else if (nicknameLength < 3 || nicknameLength > 20) {
        nicknameInputElError.classList.add('text-danger')
        nicknameInputElError.innerHTML = 'Il nickname deve essere compreso fra 3 e 20 caratteri';
    } else {
        nicknameInputElError.classList.remove('text-danger')
        nicknameInputElError.classList.add('text-success')
        nicknameInputElError.innerHTML = 'Campo valido!';
    }
});

const priceInputEl = document.getElementById('registration-form-price')
const priceInputElError = document.getElementById('registration-form-price-error')
priceInputEl.addEventListener('input', function(){
    const priceValue = priceInputEl.value

    if (priceValue.length === 0){
        priceInputElError.innerHTML = ""
    }
    else if(parseInt(priceValue) < 5){
        priceInputElError.classList.add('text-danger')
        priceInputElError.innerHTML = "Prezzo minimo richiesto: 5€"
    } else {
        priceInputElError.classList.remove('text-danger')
        priceInputElError.classList.add('text-success')
        priceInputElError.innerHTML = "Campo valido!"
    }
})

// const languageInputEl = document.getElementById('registration-form-language')
// const languageInputElError = document.getElementById('registration-form-language-error')
// languageInputEl.addEventListener('input', function(){
//     const languageValue = languageInputEl.value
// })

