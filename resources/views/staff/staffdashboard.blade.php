 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel ="stylesheet" href="{{mix('css/app.css')}}">
     <title>Staff Portal</title>
 </head>

 <!-- component -->
 <style>
   /* Compiled dark classes from Tailwind */
   .dark .dark\:divide-gray-700 > :not([hidden]) ~ :not([hidden]) {
     border-color: rgba(55, 65, 81);
   }
   .dark .dark\:bg-gray-50 {
     background-color: rgba(249, 250, 251);
   }
   .dark .dark\:bg-gray-100 {
     background-color: rgba(243, 244, 246);
   }
   .dark .dark\:bg-gray-600 {
     background-color: rgba(75, 85, 99);
   }
   .dark .dark\:bg-gray-700 {
     background-color: rgba(55, 65, 81);
   }
   .dark .dark\:bg-gray-800 {
     background-color: rgba(31, 41, 55);
   }
   .dark .dark\:bg-gray-900 {
     background-color: rgba(17, 24, 39);
   }
   .dark .dark\:bg-red-700 {
     background-color: rgba(185, 28, 28);
   }
   .dark .dark\:bg-green-700 {
     background-color: rgba(4, 120, 87);
   }
   .dark .dark\:hover\:bg-gray-200:hover {
     background-color: rgba(229, 231, 235);
   }
   .dark .dark\:hover\:bg-gray-600:hover {
     background-color: rgba(75, 85, 99);
   }
   .dark .dark\:hover\:bg-gray-700:hover {
     background-color: rgba(55, 65, 81);
   }
   .dark .dark\:hover\:bg-gray-900:hover {
     background-color: rgba(17, 24, 39);
   }
   .dark .dark\:border-gray-100 {
     border-color: rgba(243, 244, 246);
   }
   .dark .dark\:border-gray-400 {
     border-color: rgba(156, 163, 175);
   }
   .dark .dark\:border-gray-500 {
     border-color: rgba(107, 114, 128);
   }
   .dark .dark\:border-gray-600 {
     border-color: rgba(75, 85, 99);
   }
   .dark .dark\:border-gray-700 {
     border-color: rgba(55, 65, 81);
   }
   .dark .dark\:border-gray-900 {
     border-color: rgba(17, 24, 39);
   }
   .dark .dark\:hover\:border-gray-800:hover {
     border-color: rgba(31, 41, 55);
   }
   .dark .dark\:text-white {
     color: rgba(255, 255, 255);
   }
   .dark .dark\:text-gray-50 {
     color: rgba(249, 250, 251);
   }
   .dark .dark\:text-gray-100 {
     color: rgba(243, 244, 246);
   }
   .dark .dark\:text-gray-200 {
     color: rgba(229, 231, 235);
   }
   .dark .dark\:text-gray-400 {
     color: rgba(156, 163, 175);
   }
   .dark .dark\:text-gray-500 {
     color: rgba(107, 114, 128);
   }
   .dark .dark\:text-gray-700 {
     color: rgba(55, 65, 81);
   }
   .dark .dark\:text-gray-800 {
     color: rgba(31, 41, 55);
   }
   .dark .dark\:text-red-100 {
     color: rgba(254, 226, 226);
   }
   .dark .dark\:text-green-100 {
     color: rgba(209, 250, 229);
   }
   .dark .dark\:text-blue-400 {
     color: rgba(96, 165, 250);
   }
   .dark .group:hover .dark\:group-hover\:text-gray-500 {
     color: rgba(107, 114, 128);
   }
   .dark .group:focus .dark\:group-focus\:text-gray-700 {
     color: rgba(55, 65, 81);
   }
   .dark .dark\:hover\:text-gray-100:hover {
     color: rgba(243, 244, 246);
   }
   .dark .dark\:hover\:text-blue-500:hover {
     color: rgba(59, 130, 246);
   }

   /* Custom style */
   .header-right {
       width: calc(100% - 3.5rem);
   }
   .sidebar:hover {
       width: 16rem;
   }
   @media only screen and (min-width: 768px) {
       .header-right {
           width: calc(100% - 16rem);
       }
   }
 </style>
 <div x-data="setup()" class="bg-gray-800">
     <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

       <!-- Header -->
       <div class="fixed w-full  flex items-center justify-between h-14 text-white z-10">
         <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-gray-700 dark:bg-gray-800 border-none">
           <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden" src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
           <span class="hidden md:block">{{Auth::user()->name}}</span>
         </div>
         <div class="flex justify-end w-full items-center h-14 bg-gray-700  dark:bg-gray-800 header-right">

           <ul class="flex flex-end  items-center">
             <li>
           
             </li>
             <li>
               <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
             </li>
             <li>
               <form method="POST" class="text-white" action="{{ route('logout') }}">
                   @csrf

                   <x-responsive-nav-link :href="route('logout')"
                           onclick="event.preventDefault();
                                       this.closest('form').submit();">


                         <span class="text-white inline-flex mr-1">
                           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                         </span>
                         <!-- {{ __('Log out') }}  -->
                         <button type="button" class="text-white " name="button">Log out</button>




                   </x-responsive-nav-link>
               </form>

             </li>
           </ul>
         </div>
       </div>
       <!-- ./Header -->

       <!-- Sidebar -->
       <div class="bg-gray-900 fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
         <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
           <ul class="flex flex-col py-4 space-y-1">
             <li class="px-5 hidden md:block">
               <div class="flex flex-row items-center h-8">
                 <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
               </div>
             </li>
             <li>
               <a href="{{route('staffdashboard.index')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                 <span class="inline-flex justify-center items-center ml-4">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                 </span>
                 <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
               </a>
             </li>
             <li>
               <a href="{{route('stafffault.fault')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                 <span class="inline-flex justify-center items-center ml-4">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                 </span>
                 <span class="ml-2 text-sm tracking-wide truncate">Fault Report</span>
                 <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
               </a>
             </li>
         
             <li>
               <a href="{{route('staffnotification.notify')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                 <span class="inline-flex justify-center items-center ml-4">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                 </span>
                 <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                 <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> -->
               </a>
             </li>
             <li class="px-5 hidden md:block">
               <div class="flex flex-row items-center mt-5 h-8">
                 <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
               </div>
             </li>
             <li>
               <a href="{{route('staffprof.prof')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                 <span class="inline-flex justify-center items-center ml-4">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                 </span>
                 <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
               </a>
             </li>
             <li>
               <a href="{{route('staff.settings')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                 <span class="inline-flex justify-center items-center ml-4">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                   </svg>
                 </span>
                 <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
               </a>
             </li>
           </ul>
           <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Campus Facility Maintainence &copy; 2021</p>
         </div>
       </div>
       <!-- ./Sidebar -->

       <div class="h-full ml-14 mt-14 mb-10 md:ml-64">




         <div>
         <h2 class="text 3x1 mt-4 mx-8 center text-gray-800 font-bold uppercase">Recent Faults</h2>
  <!-- Client Table -->
  <div class="mt-4 mx-4">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Fault</th>
              <th class="px-4 py-3">Category</th>
              <th class="px-4 py-3">Location</th>
              <th class="px-4 py-3">Description</th>
              <th class="px-4 py-3">Action</th>
              
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach ($staffdata as $row )
            

            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  
                  <div>
                    <p class="font-semibold">{{$row->fault_name}}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">{{$row->category}}</td>
             
              <td class="px-4 py-3 text-sm">{{$row->location}}</td>

              <td class="px-4 py-3 text-sm">{{$row->description}}</td>
            
             <td class="px-4 flex justify-around py-3 text-xs">
                <span class="px-4 py-2 font-semibold leading-tight text-green-700 bg-green-300 hover:bg-green-500 rounded-full dark:bg-green-700 dark:text-green-100">edit </span>
                 <span class="px-3 py-1.5 font-semibold leading-tight text-white bg-red-700 hover:bg-blue-900 rounded-full dark:bg-green-700 dark:text-green-100">
                 <a href="/staff/delete-fault/{{$row->id}}" class="btn1 btn-danger black">delete </a> 
                 </span>
              </td>
            </tr>
               @endforeach
          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>  

</div>






        
       </div>
     </div>
   </div>

   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
   <script>
     const setup = () => {
       const getTheme = () => {
         if (window.localStorage.getItem('dark')) {
           return JSON.parse(window.localStorage.getItem('dark'))
         }
         return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
       }

       const setTheme = (value) => {
         window.localStorage.setItem('dark', value)
       }

       return {
         loading: true,
         isDark: getTheme(),
         toggleTheme() {
           this.isDark = !this.isDark
           setTheme(this.isDark)
         },
       }
     }
   </script>


 </html>