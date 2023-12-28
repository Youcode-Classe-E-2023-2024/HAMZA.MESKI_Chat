<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Chat</title>
</head>

<body>
    <main class="h-screen">
        <nav class="h-16 bg-gray-900 flex items-center justify-between p-2">
            <div class="flex items-center gap-3">
                <a href="signup.php">
                    <ion-icon name="log-out-outline" class="text-3xl text-white"></ion-icon>
                </a>
                <a href="homeGroups.php" class="text-white">back</a>
            </div>
            <div class="relative">
                <div id="menu_list" class="flex items-center gap-1 cursor-pointer">
                    <?php require_once '../controllers/homeController/navInfo.php'; ?>
                </div>
                <div class="absolute z-10 bg-white rounded-md p-2 pr-8 flex flex-col gap-2">
                    <a href="homeGroups.php" class="flex items-center w-full gap-1">
                        <ion-icon name="people" class="text-2xl"></ion-icon>
                        <p>groups</p>
                    </a>
                    <a href="#" class="flex items-center w-full gap-1">
                        <ion-icon name="man" class="text-2xl"></ion-icon>
                        <p>friends</p>
                    </a>
                    <a href="#" class="flex items-center w-full gap-1">
                        <ion-icon name="close" class="text-2xl"></ion-icon>
                        <p>blocked</p>
                    </a>
                </div>
            </div>
        </nav>
        <section id="global-content" class="bg-gray-800 h-[90.9%] grid grid-cols-3">
            <!-- groups list -->
            <section id="content" class="h-full col-span-1 overflow-auto px-2">
                <!-- my groups -->
                <?php require_once '../controllers/roomsController/fetchRooms.php'; ?>
                <!-- groups I belong to -->
                <div id="groupsIbelong">
                <?php require_once '../controllers/roomsController/roomsIbelong.php'; ?>
                </div>
            </section>

            <!-- discussion section -->
            <article id="discussionContainer" class="col-span-2">

                <main class="bg-gray-800 text-white h-12 flex items-center p-2 border-l">
                    <p id="group_members_button" class="bg-gray-900 p-1 rounded-md cursor-pointer mr-2 border">Group members</p>
                    <p id="add_friend_button" class="bg-green-500 p-1 rounded-md cursor-pointer border">Add friend</p>
                </main>
                <!-- discussionSection  -->
                <section id="nothing" class="relative h-[590px] w-full bg-green-800">
                    <main id="conversation_section" class="flex flex-col gap-2 overflow-auto bg-green-800 h-[500px] p-2">

                    </main>

                    <!-- send message section -->
                    <form id="send_message_form" class="bg-gray-900 h-14 py-2 px-8 flex gap-2">
                        <input id="message_input" name="message_input" type="text" placeholder="Type a message" class="w-full border border-gray-500 py-2 px-6">
                        <button type="submit" class="w-10 h-10 rounded-full bg-black flex justify-center items-center cursor-pointer">
                            <ion-icon name="paper-plane-outline" class="text-white text-xl"></ion-icon>
                        </button>
                    </form>

                    <!-- Group members section -->
                    <div id="groupId" groupId="<?php echo $_POST['groupId'] ?>"></div>
                    <main id="group_members_section" class="HIDDEN absolute h-full w-full top-0 left-0 overflow-auto bg-gray-800">

                    </main>
                    <!-- Add friend section -->
                    <main id="add_friend_section" class="HIDDEN absolute h-full w-full top-0 left-0 bg-gray-800">
                        <form id="add_friend_form" class="max-w-md mx-auto bg-green-500 p-8 rounded-md shadow-md mt-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Select Friends:</label>
                            <input type="text" placeholder="Friend's name" class="w-full p-2 rounded-md border border-gray-300 mb-4">

                            <main class="overflow-auto h-[200px] mb-4">
                                <div id="addFriend_section" class="bg-green-400 "></div>
                            </main>

                            <button class="w-full bg-green-800 text-white p-2 rounded-md hover:bg-green-600 focus:outline-none focus:shadow-outline-green active:bg-green-700">
                                Add
                            </button>
                        </form>
                    </main>
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
    <script src="../views/scripts/createGroup.js"></script>
    <script src="../views/scripts/handleGroup.js"></script>
    <script src="../views/scripts/sendMessageRoom.js"></script>
    <script src="../views/scripts/roomsIbelong.js"></script>
</body>

</html>