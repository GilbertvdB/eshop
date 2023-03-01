
<aside id="side-menu" class="absolute bg-gray-700 w-48 text-white h-96 transition-all ease-in-out delay-300">
    <div class="px-2 py-2">
        <div>
            <p class="">John Doe</p>
            <p class="text-xs">Backend Developer</p>
        </div>
    </div>
  <ul class="list-none px-6">
    <li class="text-white font-medium py-2">
      <a href="#" class="block flex items-center hover:text-sky-500 {{ (request()->routeIs('admin.dashboard')) ? 'text-sky-500' : '' }}">
      <svg class="mr-2" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> 
        <path d="M12 4L12 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
        <path d="M4 8L6.5 10.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
        <path d="M17.5 10.5L20 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
        <path d="M3 17H6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
        <path d="M12 17L13 11" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
        <path d="M18 17H21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
        <path d="M8.5 20.001H4C2.74418 18.3295 2 16.2516 2 14C2 8.47715 6.47715 4 12 4C17.5228 4 22 8.47715 22 14C22 16.2516 21.2558 18.3295 20 20.001L15.5 20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
        <path d="M12 23C13.6569 23 15 21.6569 15 20C15 18.3431 13.6569 17 12 17C10.3431 17 9 18.3431 9 20C9 21.6569 10.3431 23 12 23Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
      </svg>  
    Dashboard</a>
    </li>
    <li class="text-white font-medium py-2">
    <details><summary class="cursor-pointer list-none hover:text-sky-500 flex item-center py-1">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
       </svg>   
        <div>Users</div>
 		<div class="ml-1">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
 		</summary>
 			<ul class="pl-4">
 				<li><a href="" class="block hover:text-gray-800 hover:bg-gray-100 py-1 pl-6 {{ (request()->routeIs('familie.create')) ? 'text-sky-500' : '' }}" >Admin Users</a></li>
 				<li><a href="" class="block hover:text-gray-800 hover:bg-gray-100 py-1 pl-6 active:bg-gray-200 {{ (request()->routeIs('familie.index')) ? 'text-sky-500' : '' }}" >Roles</a></li>
                 <li><a href="" class="block hover:text-gray-800 hover:bg-gray-100 py-1 pl-6 active:bg-gray-200 {{ (request()->routeIs('familie.index')) ? 'text-sky-500' : '' }}" >Permission</a></li>
            </ul>
 	</li></details>
    <li class="text-white font-medium py-2">
      <a href="#" class="block flex items-center hover:text-sky-500">
      <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
        <circle cx="12" cy="12" r="3"></circle>
        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
    </svg> 
      Settings</a>
    </li>

    
  </ul>

    <script>
    const toggleBtn = document.getElementById("toggle-menu");
    const sideMenu = document.getElementById("side-menu");

    toggleBtn.addEventListener("click", function() {
    sideMenu.classList.toggle("hidden");
    });
    
    </script>
</aside>