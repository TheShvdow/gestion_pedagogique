<?php include 'head.html.php'; ?>
<body class="w-[100vw] h-[100vh] flex justify-center">
<?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
   <!-- component -->
	<form action="" method="POST">
<div class="w-full h-full  py-6 flex flex-col justify-center sm:py-12">
	<div class=" w-[70vw]  relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="h-[60vh] absolute inset-0 bg-gradient-to-r from-blue-200 to-blue-300 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="h-[60vh] relative px-4 py-10 bgcolor shadow-lg sm:rounded-3xl sm:p-20">
			<div class=" max-w-md mx-auto">
				<div class="flex justify-center items-center">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJd6peDvOqaNnWCcLH1ZEHmgIx2oCwVyBEkQ&s" alt=""class="h-20 w-20" > <h2 class="mt-4 text-3xl font-semibold text-white ml-10 ">Ecole 221</h2>
				</div>
				<div class="gap-10 divide-y divide-gray-200 ">
					<div class="flex-1 justify-between py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
						<div class="relative my-10">
							<input autocomplete="off" id="email" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required type="email" class="peer placeholder-transparent h-10 w-full text-white bgcolor border-b focus:outline-none focus:borer-rose-600" placeholder="Email address" />
							<label for="email" class="absolute left-0 -top-3.5 text-white text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-white peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-white  peer-focus:text-sm">Username</label>
						</div>
						<div class="relative my-10">
							<input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b bgcolor text-white focus:outline-none focus:borer-rose-600" placeholder="Password" />
							<label for="password" class="absolute left-0 -top-3.5 text-white text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-white peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-white peer-focus:text-sm">Password</label>
						</div>
						<div class="relative mt-10">
							<button class="absolute bg-white -bottom-28 left-28 w-48 text-gray-900 rounded-md px-2 py-1">Se Connecter</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<!--  -->