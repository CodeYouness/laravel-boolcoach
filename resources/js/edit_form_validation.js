document.getElementById('registration-form').addEventListener('submit', function(event) {

    const price = document.getElementById('registration-form-price').value;
    const priceError = document.getElementById('registration-form-price-error');

    priceError.textContent = '';
    document.getElementById('registration-form-price').classList.remove('is-invalid');

    if (isNaN(price) || price <= 0) {
        event.preventDefault();
        priceError.textContent = 'Il valore inserito non è valido.';
        document.getElementById('registration-form-price').classList.add('is-invalid');
    }
});
