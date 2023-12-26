const sendMessageForm = document.getElementById('send_message_form');
const messageInput = document.getElementById('message_input'); 

sendMessageForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this); 
    fetch('../controllers/messagesController/sendMessage.php', {
        method: 'POST', 
        body: formData
    })
    .then(response=>response.text())
    .then(data=>console.log(data))
    .then(()=>messageInput.value = '');
})

