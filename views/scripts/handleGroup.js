const group_members_button = document.getElementById('group_members_button'); 
const group_members_section = document.getElementById('group_members_section');
const add_friend_button = document.getElementById('add_friend_button'); 
const add_friend_section = document.getElementById('add_friend_section'); 

group_members_button.addEventListener('click', function() {
    group_members_section.classList.toggle('HIDDEN');
})

add_friend_button.addEventListener('click', function() {
    add_friend_section.classList.toggle('HIDDEN');
})

// Group members logic
const groupId = document.getElementById('groupId');
const formData = new FormData();
formData.append('groupId', groupId.getAttribute('groupId'));
fetch('../controllers/roomsController/fetchRoomMembers.php', {
    method: 'POST', 
    body: formData
})
.then(response=>response.text())
.then(data=> {
    console.log(data);
    group_members_section.innerHTML = data;
});

// Add friend logic 
fetch('../controllers/roomsController/fetchFriends.php')
.then(response=>response.text())
.then(data=> {
    console.log(data);
    add_friend_section.innerHTML = data;
});