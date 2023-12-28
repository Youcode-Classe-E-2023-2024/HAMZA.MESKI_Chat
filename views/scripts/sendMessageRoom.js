const sendMessageForm = document.getElementById('send_message_form');
const messageInput = document.getElementById('message_input'); 
const conversationSection = document.getElementById('conversation_section');

function bringMessage() {
    const formData = new FormData(); 
    formData.append('groupId', groupId.getAttribute('groupId'));
    fetch('../controllers/roomsController/receiveMessageRoom.php', {
        method: 'POST', 
        body: formData
    })
    .then(response=>response.text())
    .then(data=> {
        conversationSection.innerHTML = data;
        conversationSection.scrollTop = conversationSection.scrollHeight;
    });
}
setInterval(function(){
    bringMessage();
}, 1000);

function insertMessage(event) {
    event.preventDefault();
    const formData = new FormData(this); 
    formData.append('groupId', groupId.getAttribute('groupId'));
    fetch('../controllers/roomsController/sendMessageRoom.php', {
        method: 'POST', 
        body: formData
    })
    .then(response=>response.text())
    .then(data=> {
        // console.log(data)
        conversationSection.innerHTML = data;
        messageInput.value = '';
        conversationSection.scrollTop = conversationSection.scrollHeight;
    });
}
sendMessageForm.addEventListener('submit', insertMessage);