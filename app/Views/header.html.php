<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="bgcolore w-60 flex flex-col items-center p-4">
        <div class="mb-8 flex flex-col justify-between items-center">
            <span href="/" style="cursor:pointer;">
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJd6peDvOqaNnWCcLH1ZEHmgIx2oCwVyBEkQ&s" alt=""class="h-20 w-20" > <h2 class="mt-4 text-3xl font-semibold text-white ml-10 ">Ecole 221</h2>
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
                    <span class="font-bold"><?php /* echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']) */; 
                    // echo '<pre>';
                    // var_dump($user['prenom']);
                    // echo '</pre>';
                    ?></span>
                </div>
                <button class="p-2 rounded-full bg-gray-300">
                    <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>