document.addEventListener('DOMContentLoaded', function() {
    const formEl = document.getElementById('registration-form');

    formEl.addEventListener('submit', function(event) {
        event.preventDefault();

        let formIsValid = true;

        const nameInput = document.getElementById('registration-form-name');
        const nameError = document.getElementById('registration-form-name-error');
        if (nameInput.value.trim().length < 3 || nameInput.value.trim().length > 20) {
            nameError.textContent = 'Il nome deve essere tra 3 e 20 caratteri.';
            formIsValid = false;
        } else {
            nameError.textContent = '';
        }

        const surnameInput = document.getElementById('registration-form-surname');
        const surnameError = document.getElementById('registration-form-surname-error');
        if (surnameInput.value.trim().length < 3 || surnameInput.value.trim().length > 20) {
            surnameError.textContent = 'Il cognome deve essere tra 3 e 20 caratteri.';
            formIsValid = false;
        } else {
            surnameError.textContent = '';
        }

        const nicknameInput = document.getElementById('registration-form-nickname');
        const nicknameError = document.getElementById('registration-form-nickname-error');
        if (nicknameInput.value.trim().length < 3 || nicknameInput.value.trim().length > 20) {
            nicknameError.textContent = 'Il nickname deve essere tra 3 e 20 caratteri.';
            formIsValid = false;
        } else {
            nicknameError.textContent = '';
        }

        const priceInput = document.getElementById('registration-form-price');
        const priceError = document.getElementById('registration-form-price-error');
        if (!/^\d+(\.\d{1,2})?$/.test(priceInput.value)) {
            priceError.textContent = 'Il prezzo deve essere un numero valido (es. 99.99).';
            formIsValid = false;
        } else {
            priceError.textContent = '';
        }

        const languageInput = document.getElementById('registration-form-language');
        const languageError = document.getElementById('registration-form-language-error');
        if (languageInput.value.trim().length < 2) {
            languageError.textContent = 'La lingua deve contenere almeno 2 caratteri.';
            formIsValid = false;
        } else {
            languageError.textContent = '';
        }

            //! GESTISCE GLI ERRORI DELLE PASSWORD
            document.getElementById('password-error').textContent = '';
            document.getElementById('password-confirm-error').textContent = '';

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password-confirm').value;

            if (password !== confirmPassword) {
                event.preventDefault();
                formIsValid = false
                document.getElementById('password-confirm-error').textContent = 'Le password non coincidono.';
                document.getElementById('password').classList.add('is-invalid');
                document.getElementById('password-confirm').classList.add('is-invalid');
            } else {
                document.getElementById('password').classList.remove('is-invalid');
                document.getElementById('password-confirm').classList.remove('is-invalid');
            }

        if (formIsValid) {
            formEl.submit();
        }
    });
});
