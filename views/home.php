<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="h-screen">
        <nav class="h-14 bg-gray-800 flex items-center justify-between px-2">
            <a href="signup.php">
                <ion-icon name="log-out-outline" class="text-3xl text-white"></ion-icon>
            </a>
            <div class="flex items-center gap-1">
                <?php require_once '../controllers/homeController/navInfo.php'; ?>
            </div>
        </nav>
        <section id="global-content" class="bg-red-400 h-[92%] grid grid-cols-3">
            <!-- contacts list -->
            <section id="content" class="h-full col-span-1 overflow-auto">

            </section>
    
            <!-- discussion section -->
            <section class="h-full col-span-2 bg-green-300 flex flex-col justify-between">

                <!-- conversation section -->
                <main id="conversation-section" class="flex flex-col gap-2 overflow-auto bg-green-800 h-full p-2">
                    <div class="bg-green-400 p-2 self-end rounded-lg rounded-tr-none">
                        Hello, My friend I hope that you are okey!
                    </div>
                    <div class="bg-gray-200 p-2 self-start rounded-lg rounded-tl-none">
                        hello world!
                    </div>
                </main>

                <!-- send message section -->
                <form id="send-message-form" class="bg-gray-800 h-14 py-2 px-8 flex gap-2">
                    <input id="send-message" name="send-message" type="text" placeholder="Type a message" class="w-full border border-gray-500 py-2 px-6">
                    <button type="submit" class="w-10 h-10 rounded-full bg-black flex justify-center items-center cursor-pointer">
                        <ion-icon name="paper-plane-outline" class="text-white text-xl"></ion-icon>
                    </button>
                </form>
            </section>
        </section>
    </main>
    <!-- ionicicons script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- tailwind cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>