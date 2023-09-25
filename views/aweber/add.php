

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/styles.css">
    <link rel="stylesheet" href="/src/css/tailwind.css">
    <link rel="icon" href="/src/images/logo-1666417736.png" />
    <script src="/src/js/app.js"></script>
    <title>Login</title>
</head>
<body class="h-full">
<?php
    $success_class = 'hidden';
    $existing_class = 'hidden';
    $register_class = '';
    if(isset($_GET['registration'])){
      $register_class = 'hidden';
      $success_class = '';
    }
    if(isset($_GET['existing'])){
      $register_class = 'hidden';
      $existing_class = '';
    }
  ?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 <?=$register_class;?>">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <!-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Aweber API</h2>
    <img class="mx-auto h-10 w-auto" src="/src/images/aweber.svg" alt="Your Company">
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/aweber/subscriber/add" method="POST">
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
        <div class="mt-2">
          <input id="name" name="name" type="text" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
        </div>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="current-email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Add Custom fields per line</label>
        </div>
        <div class="mt-2">
          <p>ex.  Key:Value </p>
            <textarea name="custom_fields" id="" cols="30" rows="10" placeholder="Key:value"class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
        </div>
      </div>

      <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>

