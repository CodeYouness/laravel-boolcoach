console.log('ciao da delete confirmation')
const formEl = document.getElementById('show-page-delete-form')
formEl.addEventListener('submit', function(event){
    event.preventDefault();
    const userChoice = window.confirm('Are you sure you want to delete this user?');
    if(userChoice){
        this.submit();
    }
})
