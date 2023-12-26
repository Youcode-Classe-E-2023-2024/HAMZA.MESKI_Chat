const contactLists = document.querySelectorAll('.contactList'); 
const discussionSection = document.getElementById('discussionSection'); 
const nothing = document.getElementById('nothing'); 

for(const contactList of contactLists)
contactList.addEventListener('click', function() {
   console.log(contactList.getAttribute('contactId'));
   discussionSection.classList.remove('HIDDEN'); 
   nothing.classList.add('HIDDEN');
})