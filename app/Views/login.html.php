<?php include 'head.html.php'; ?>

<body class="w-[100vw] h-[100vh] flex justify-center ">
    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <!-- component -->
    <form action="" method="POST">
        <div class="w-full h-full py-6 flex flex-col justify-center sm:py-12">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class=" w-[70vw]  relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="h-[60vh] absolute inset-0 bg-gradient-to-r from-blue-200 to-blue-300 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl animate-background">
                </div>
            </div>
            <div class="relative h-[60vh] px-4 py-10 bgcolor shadow-lg sm:rounded-3xl sm:p-20 fade-in-form">
                <div class=" max-w-md mx-auto">
                    <div class="flex justify-center items-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJd6peDvOqaNnWCcLH1ZEHmgIx2oCwVyBEkQ&s" alt="" class="h-20 w-20">
                        <h2 class="mt-4 text-3xl font-semibold text-white ml-10 ">Ecole 221</h2>
                    </div>
                    <div class="gap-10">
                        <div class="flex-1 justify-between py-8 text-base leading-10 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="relative my-10">
                                <input autocomplete="off" id="email" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required type="email" class="peer placeholder-transparent h-10 w-full text-white bg-transparent border-b focus:outline-none focus:borer-rose-600" placeholder="Email address" />
                                <label for="email" class="absolute left-0 -top-3.5 text-white text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-white peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-white  peer-focus:text-sm">Username</label>
                            </div>
                            <div class="relative my-10">
                                <input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b bg-transparent text-white focus:outline-none focus:borer-rose-600" placeholder="Password" />
                                <label for="password" class="absolute left-0 -top-3.5 text-white text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-white peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-white peer-focus:text-sm">Password</label>
                                <span class="absolute top-3 right-5 cursor-pointer" onclick="togglePasswordVisibility()">
                                    <svg class="text eye-icon" id="eye-icon" xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512">
                                        <path fill="#f6f5f4" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="rememberMe" name="rememberMe" class="form-checkbox h-4 w-4 text-white" /> <label for="rememberMe" class="text-sm text-white">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="text-white hover:text-blue-600 hover:underline">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative mt-10 flex justify-between">
                            <button class="bg-white w-48 h-16 text-[#295677] rounded-md px-2 py-1">Se Connecter</button>
                            <a href="/register" class="w-48 h-16 hover:bg-white hover:text-[#295677] border-2 text-center py-4 rounded-md text-white self-center">S'inscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php include 'footer1.html.php'; ?>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path fill="#f6f5f4" d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.5 12.4 3.3 24.3 8 35.1l-53.8-42.2c-.6-2-1.2-3.9-1.7-5.9c-11.2-42-1.5-84.7 29.5-113.2zM64.8 208.3c-6.7 8.3-12.8 16.7-18.1 24.9c-3.3 5.1-3.3 11.6 0 16.7C90.1 328 153.5 400 320 400c55.3 0 100.8-16.4 137.3-38.8l-46.4-36.4C384.1 345.9 353.8 360 320 360c-79.5 0-144-64.5-144-144c0-5.2 .3-10.4 .7-15.5L109.5 138.3c-17.6 17.8-31.4 36.1-44.7 55.3z"/>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path fill="#f6f5f4" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>';
            }
        }
    </script>
</body>