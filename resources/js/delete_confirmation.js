console.log('ciao da delete confirmation')
const formEl = document.getElementById('show-page-delete-form')
formEl.addEventListener('submit', function(event){
    event.preventDefault();
    const userChoice = window.confirm('Eliminare questo profilo?');
    if(userChoice){
        this.submit();
    }
})
