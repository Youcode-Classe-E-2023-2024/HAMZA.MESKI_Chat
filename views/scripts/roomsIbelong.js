const groupsIbelong = document.getElementById('groupsIbelong');

fetch('../controllers/roomsController/roomsIbelong.php', {
    
})
.then(response=>response.text())
.then(data=> {
    console.log(data);
    // addFriend_section.innerHTML = data;
});