<?php include dirname(__DIR__).'/layout/header.php'; ?>

   <div class="flex bg-gray-100 min-h-screen"  id="app">
   <!-- aside -->
   <?php include dirname(__DIR__).'/layout/aside.php'; ?>
      <div class="flex-grow text-gray-800">
      <!-- Navbar -->
      <?php include dirname(__DIR__).'/layout/navbar.php'; ?>
        <section>
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Aweber API</h2>
                    <img class="mx-auto h-10 w-auto" src="src/images/aweber.svg" alt="Your Company">
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="/api/aweber/accesstoken" method="POST">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Generate Access Token
                        </button>
                    </form>
                    <a href="/aweber/subscriber/form">
                        <button type="button"
                        class="mt-2 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add Subscirber
                        </button>
                    </a>
                </div>
            </div>
        </section>
      </div>
   </div>
<?php include dirname(__DIR__).'/layout/footer.php'; ?>