<aside class="flex flex-col _aside" :class="`${aside ? '' : '_mobile_hidden'}`" >
         <a href="#"
            class="inline-flex items-center justify-center h-20 w-full bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500" @click="toggleMenu()">
            <img class="mx-auto h-10 w-auto" src="/src/images/aweber.svg" alt="Your Company" style="width:150px;">
         </a>
         <div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
            <nav class="flex flex-col mx-4 my-6 space-y-4">
               <a href="/dashboard"
                  class="inline-flex items-center py-3 hover:text-gray-400  rounded-lg px-2 "  :class="`${menu ? '' : 'justify-center'}`">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                  </svg>
                  <span class="ml-2" v-if="menu">dashboard</span>
               </a>
               <a href="/aweber/subscriber/form"
                  class="inline-flex items-center py-3 hover:text-gray-400  rounded-lg px-2 "  :class="`${menu ? '' : 'justify-center'}`">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                  </svg>
                  <span class="ml-2" v-if="menu">Add Subscriber</span>
               </a>
               
            </nav>
            <div class="flex justify-end">
               <a
                  class="inline-flex p-3 hover:text-gray-400 justify-center border-gray-700 h-15 w-full border-t hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 px-2" :class="`${menu ? '' : 'justify-center'}`">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <span class="ml-2" v-if="menu">Settings</span>
               </a>
            </div>
         </div>
      </aside>