// send friend request logic
const sendFriendRequestForm = document.querySelectorAll('.sendFriendRequestForm'); 
for(const sendRequest of sendFriendRequestForm)
sendRequest.addEventListener('submit', function(event){
    event.preventDefault();
    
    const formData = new FormData(this); 
    fetch('../controllers/invitationsController/sendInvitation.php', {
        method: 'POST', 
        body: formData
    })
    .then(response=>response.text())
    .then(data=>{
        console.log('send');
        console.log(data); 
        location.reload();
    });
})

// 
fetch('../controllers/invitationsController/fetchInvitations.php')
.then(response=>response.text())
.then(data=>{
    console.log(data); 
});