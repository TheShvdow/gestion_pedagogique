<?php $user = $_SESSION['user'];

?>
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="bgcolore w-60 flex flex-col items-center p-4">
        <div class="mb-8 flex flex-col justify-between items-center">
            <span href="/" style="cursor:pointer;">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJd6peDvOqaNnWCcLH1ZEHmgIx2oCwVyBEkQ&s" alt="" class=" ml-14 h-20 w-20">
                <h2 class="mt-4 text-3xl font-semibold text-white ml-7 ">Ecole 221</h2>
            </span>
        </div>
        <nav class="flex flex-col space-y-10    ">
            <a href="/" class="bg-white text-blue-500 py-2 px-4 rounded-lg text-center">Cours</a>
            <a href="/sessions" class="bg-white text-blue-500 py-2 px-4 rounded-lg">SESSIONS</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Liste des Cours</h1>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600">Connecté</span>
                    <span class="font-bold"><?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']);?></span>
                </div>
                <a href="/logout" class="p-2 rounded-full bg-gray-300" data-popover-target="popover-deconnexion" data-popover-placement="bottom">
                    <!-- <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg> -->
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                    </svg>
                </a>
                <div data-popover id="popover-deconnexion" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                    <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Déconnexion</h3>
                    </div>
                    <div data-popper-arrow></div>
                </div>
            </div>
        </div>