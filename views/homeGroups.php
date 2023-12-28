
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
                <a href="home.php" class="text-white">back</a>
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
                <!-- discussionSection  -->
              
                <section id="nothing" class="relative h-full w-full bg-green-800 flex flex-col justify-center items-center ">

                    <img src="../images/message-circle.svg" alt="" class="h-[30%] w-[18%] opacity-15 ">

                    <!-- create group form -->
                    <form id="create_group_form" class="HIDDEN absolute bg-gray-800 p-8 rounded-md shadow-md">
                        <label for="group_name" class="block text-white text-lg mb-2">Enter Group Name:</label>
                        <input type="text" name="room_name" placeholder="Group Name" class="w-full px-3 py-2 mb-4 rounded-md border focus:outline-none focus:ring focus:border-blue-300">
                        <button id="submit" type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:border-blue-300">Create</button>
                    </form>

                    <!-- create group button -->
                    <div id="create_group_button" class="bg-green-500 absolute bottom-4 right-4 flex gap-1 items-center p-2 cursor-pointer rounded-md">
                        <p>create group</p>
                        <ion-icon name="add-circle" class="text-2xl"></ion-icon>
                    </div>

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
</body>

</html>