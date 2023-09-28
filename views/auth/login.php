

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/styles.css">
    <link rel="stylesheet" href="/src/css/tailwind.css">
    <script src="/src/js/app.js"></script>
    <title>Login</title>
</head>
<?php
 $showMessage = false;
if(isset($_GET['message'])){
  $message = $_GET['message'];
  $showMessage = true;
}
?>
<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 <?=($showMessage) ? 'hidden' :'';?>">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/signin" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <div class="mt-2">
          <input id="email" name="username" type="text" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 px-4 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
       
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Not a member?
      <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register</a>
    </p>
  </div>
</div>

<div class="bg-gray-100 <?=($showMessage) ? '' :'hidden';?> ">
  <div class="bg-white p-6  md:mx-auto">
    <div class="mx-auto">
      <img src="src/images/error.webp" alt="" class="h-[70px] mx-auto">
    </div>
    <div class="text-center">
        <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center uppercase"><?=$message;?></h3>
        <p class="text-gray-600 my-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam culpa sint libero nesciunt, voluptatem debitis ad nostrum eaque tenetur unde.</p>
        <p class="md:text-1xl text-base text-gray-900 font-semibold text-center"> Please register.</p>
        <div class="py-10 text-center">
            <a href="/login"  class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                GO BACK 
          </a>
        </div>
    </div>
  </div>
</div>
</body>
</html>

