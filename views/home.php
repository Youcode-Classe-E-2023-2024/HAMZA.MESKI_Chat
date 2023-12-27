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
            <a href="signup.php">
                <ion-icon name="log-out-outline" class="text-3xl text-white"></ion-icon>
            </a>
            <div class="relative">
                <div id="menu_list" class="flex items-center gap-1 cursor-pointer">
                    <?php require_once '../controllers/homeController/navInfo.php'; ?>
                </div>
                <div class="absolute bg-white rounded-md p-2 pr-8 flex flex-col gap-2">
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
            <!-- contacts list -->
            <section id="content" class="h-full col-span-1 overflow-auto px-2">
                <?php require_once '../controllers/homeController/contactsList.php'; ?>
            </section>

            <!-- discussion section -->
            <article id="discussionContainer" class="col-span-2">
                <!-- discussionSection  -->
              
                <!-- Nothing  -->
                <section id="nothing" class="h-full bg-green-800 flex flex-col justify-center items-center ">
                    <img src="../images/message-circle.svg" alt="" class="h-[30%] w-[18%] opacity-15 ">
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
</body>

</html>