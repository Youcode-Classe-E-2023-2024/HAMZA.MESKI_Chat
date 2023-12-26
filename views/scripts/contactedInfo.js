const contactId = document.getElementById('contactId'); 
console.log(contactId);
const formData = new FormData(); 
formData.append('contactId', contactId.getAttribute('contactId'));
fetch('../controllers/homeController/contactedInfo.php', {
    method: 'POST', 
    body: formData
})
.then(response=>response.text())
.then(data=>console.log(data)); 