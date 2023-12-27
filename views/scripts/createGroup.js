const createGroupForm = document.getElementById('create_group_form');
const createGroupButton = document.getElementById('create_group_button');

function toggleGroupForm() {
    createGroupForm.classList.toggle('HIDDEN');
}
if(createGroupButton) {
    createGroupButton.addEventListener('click', toggleGroupForm);
    //
    createGroupForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('../controllers/roomsController/createRoom.php', {
            method: 'POST', 
            body: formData
        })
        .then(response=>response.text())
        .then(data=>{
            console.log(data);
            toggleGroupForm();
            location.reload();
            console.log('Okey')
        })
    })
}