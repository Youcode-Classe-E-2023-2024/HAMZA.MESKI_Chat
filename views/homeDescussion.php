<?php 
// session_start();
// echo $_SESSION['user-id']; 
// echo '<br>'; 
// echo $_POST['contactId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Chat</title>
</head>

<body>
    <div id="contactId" contactId="<?php echo $_POST['contactId'];?>"></div>
    <main class="h-screen">
        <nav class="h-16 bg-gray-900 flex items-center justify-between p-2">
            <a href="signup.php">
                <ion-icon name="log-out-outline" class="text-3xl text-white"></ion-icon>
            </a>
            <div class="flex items-center gap-1">
                <?php require_once '../controllers/homeController/navInfo.php'; ?>
            </div>
        </nav>
        <section id="global-content" class="bg-gray-800 h-[90.9%] grid grid-cols-3">
            <!-- contacts list -->
            <section id="content" class="h-full col-span-1 overflow-auto px-2">
                <?php require_once '../controllers/homeController/contactsList.php'; ?>
            </section>

            <!-- discussion section -->
            <article id="discussionContainer" class="col-span-2">
                <!-- discussionSection  -->
                <section id="discussionSection" class=" h-full bg-green-300 flex flex-col justify-between">
                    <!-- conversation section -->
                    <?php require_once '../controllers/homeController/contactedInfo.php';?>
                    <main id="conversation_section" class="flex flex-col gap-2 overflow-auto bg-green-800 h-[500px] p-2">

                    </main>

                    <!-- send message section -->
                    <form id="send_message_form" class="bg-gray-900 h-14 py-2 px-8 flex gap-2">
                        <input type="hidden" name="contactId" value="<?php echo $_POST['contactId'] ?>">
                        <input id="message_input" name="message_input" type="text" placeholder="Type a message" class="w-full border border-gray-500 py-2 px-6">
                        <button type="submit" class="w-10 h-10 rounded-full bg-black flex justify-center items-center cursor-pointer">
                            <ion-icon name="paper-plane-outline" class="text-white text-xl"></ion-icon>
                        </button>
                    </form>
                </section>
            </article>
        </section>
    </main>
    <!-- ionicicons script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- tailwind cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- local scripts -->
    <script src="../views/scripts/contactId.js"></script>
    <script src="../views/scripts/contactedInfo.js"></script>
    <script src="../views/scripts/sendMessage.js"></script>
    <!-- <script src="../views/scripts/conversationSection.js"></script> -->
</body>

</html>