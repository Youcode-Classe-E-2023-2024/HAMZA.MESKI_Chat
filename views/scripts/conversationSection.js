const conversationSection = document.getElementById('conversation_section');
fetch('../controllers/messagesController/receiveMessage.php', {
    method: 'POST', 
    body: formData
})
.then(response=>response.text())
.then(data=>console.log(data)); 