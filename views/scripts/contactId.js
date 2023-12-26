const contactLists = document.querySelectorAll('.contactList'); 
for(const contactList of contactLists)
contactList.addEventListener('click', function() {
   console.log(contactList.getAttribute('contactId'));
})