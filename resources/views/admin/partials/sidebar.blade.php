
<aside id="side-menu" class="sidenav fixed h-full w-48 top-10 left-0 z-10 bg-gray-700 text-white overflow-x-hidden transition-all duration-300" style="transform: translateX(0%)">
    <div class="px-2 py-2">
        <div>
            <p class="">John Doe</p>
            <p class="text-xs">Backend Developer</p>
        </div>
    </div>
  <ul class="list-none px-6">
    <li class="text-white font-medium py-2">
      <a href="{{ route('admin.dashboard') }}" class="block flex items-center hover:text-sky-500 {{ (request()->routeIs('admin.dashboard')) ? 'text-sky-500' : '' }}">
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
      <a href="{{ route('admin.settings') }}" class="block flex items-center hover:text-sky-500 {{ (request()->routeIs('admin.settings')) ? 'text-sky-500' : '' }}">
      <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" >
        <circle cx="12" cy="12" r="3"></circle>
        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
    </svg> 
      Settings</a>
    </li>
    <li class="text-white font-medium py-2">
      <a href="{{ route('admin.categories.index') }}" class="block flex items-center hover:text-sky-500 {{ (str_starts_with(request()->route()->getName(), 'admin.categories')) ? 'text-sky-500' : '' }}">
      <svg class="mr-2" width="24px" height="24px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier"> <title>category-list</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> 
        <rect width="48" height="48" fill="none"></rect> </g> <g id="icons_Q2" data-name="icons Q2"> 
          <path d="M24,10h0a2,2,0,0,1,2-2H42a2,2,0,0,1,2,2h0a2,2,0,0,1-2,2H26A2,2,0,0,1,24,10Z"></path> 
          <path d="M24,24h0a2,2,0,0,1,2-2H42a2,2,0,0,1,2,2h0a2,2,0,0,1-2,2H26A2,2,0,0,1,24,24Z"></path> 
          <path d="M24,38h0a2,2,0,0,1,2-2H42a2,2,0,0,1,2,2h0a2,2,0,0,1-2,2H26A2,2,0,0,1,24,38Z"></path> 
          <path d="M12,7.9,14.4,12H9.5L12,7.9M12,2a2.1,2.1,0,0,0-1.7,1L4.2,13a2.3,2.3,0,0,0,0,2,1.9,1.9,0,0,0,1.7,1H18a2.1,2.1,0,0,0,1.7-1,1.8,1.8,0,0,0,0-2l-6-10A1.9,1.9,0,0,0,12,2Z"></path> 
          <path d="M12,30a6,6,0,1,1,6-6A6,6,0,0,1,12,30Zm0-8a2,2,0,1,0,2,2A2,2,0,0,0,12,22Z"></path> 
      <path d="M16,44H8a2,2,0,0,1-2-2V34a2,2,0,0,1,2-2h8a2,2,0,0,1,2,2v8A2,2,0,0,1,16,44Zm-6-4h4V36H10Z"></path> </g> </g> </g></svg>
      Categories</a>
    </li>
    <li class="text-white font-medium py-2">
      <a href="{{ route('admin.brands.index') }}" class="block flex items-center hover:text-sky-500 {{ (str_starts_with(request()->route()->getName(), 'admin.brands')) ? 'text-sky-500' : '' }}">
      <svg class="mr-2" width="24" height="24" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="none" stroke="currentColor">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>label</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="icon" fill="currentColor" transform="translate(21.333333, 106.666667)"> 
        <path d="M448,2.84217094e-14 L448,298.666667 L106.666667,298.666667 L3.55271368e-15,149.333333 L106.666667,2.84217094e-14 L448,2.84217094e-14 Z M405.333333,42.6666667 L128.597333,42.6666667 L52.416,149.333333 L128.618667,256 L405.333333,256 L405.333333,42.6666667 Z M138.666667,117.333333 C156.339779,117.333333 170.666667,131.660221 170.666667,149.333333 C170.666667,167.006445 156.339779,181.333333 138.666667,181.333333 C120.993555,181.333333 106.666667,167.006445 106.666667,149.333333 C106.666667,131.660221 120.993555,117.333333 138.666667,117.333333 Z M213.333333,170.666667 L362.666667,170.666667 L362.666667,213.333333 L213.333333,213.333333 L213.333333,170.666667 Z M213.333333,85.3333333 L362.666667,85.3333333 L362.666667,128 L213.333333,128 L213.333333,85.3333333 Z" id="Combined-Shape"> </path> 
        </g> </g> </g>
      </svg>
      Brands</a>
    </li>
    <li class="text-white font-medium py-2">
      <a href="{{ route('admin.products.index') }}" class="block flex items-center hover:text-sky-500 {{ (str_starts_with(request()->route()->getName(), 'admin.products')) ? 'text-sky-500' : '' }}">
      <svg class="mr-2" width="24" height="24" viewBox="0 0 511.977 511.977" fill="currentColor" stroke="currentColor" stroke-width="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g>
        <path d="M327.113,76.48c-16.64,16.64-16.64,43.627,0,60.373c8,8,18.88,12.48,30.187,12.48c23.573,0,42.667-19.093,42.667-42.667 c0-11.307-4.48-22.187-12.48-30.187C371.379,60.373,343.219,60.373,327.113,76.48z M372.979,121.28 c-0.213,0.213-0.32,0.32-0.533,0.533c-8.427,8.107-21.76,8.107-30.187,0c-8.427-8.427-8.427-21.867,0-30.187 c8.213-8.427,21.653-8.747,30.187-0.533S381.193,112.747,372.979,121.28z"></path>
        <path d="M495.433,139.627L453.299,15.36v-4.693C453.299,4.8,448.5,0,442.633,0h-139.84c-2.88,0-5.547,1.173-7.573,3.093 L26.313,272.213c-13.76,14.4-13.76,37.013,0,51.413L130.42,427.093c3.947,3.84,8.64,6.72,13.867,8.427 c0.533,3.307,2.56,6.187,5.547,7.68l131.733,65.173c17.28,8.533,38.293,1.387,46.827-15.893c0.107-0.107,0.107-0.213,0.213-0.427 l0.533-1.067l113.493,10.347c16.107,0,32-15.253,32-30.933V192c-0.107-0.533-0.213-1.067-0.32-1.707l20.587-42.667 C496.18,145.173,496.286,142.187,495.433,139.627z M145.459,411.947L41.353,308.48c-5.44-5.973-5.44-15.147,0-21.12 L307.166,21.333h124.8v126.4L165.619,411.947C159.966,417.387,151.113,417.387,145.459,411.947z M453.299,470.4 c0,3.307-5.653,9.6-9.707,9.6l-104.64-9.493l114.347-236.693V470.4z M309.406,482.773c-1.6,3.413-4.48,5.973-8,7.147 c-3.413,1.173-7.147,0.96-10.347-0.64l-116.16-57.6c2.133-1.387,4.053-2.88,5.76-4.693l269.44-267.307 c2.027-2.027,3.2-4.693,3.2-7.573V81.813l20.48,60.48L309.406,482.773z"></path> 
      </g> </g> </g> </g>
    </svg>
      Products</a>
    </li>
    <li class="text-white font-medium py-2">
      <a href="{{ route('admin.orders.index') }}" class="block flex items-center hover:text-sky-500 {{ (str_starts_with(request()->route()->getName(), 'admin.orders')) ? 'text-sky-500' : '' }}">
      <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier"> <rect x="5" y="4" width="18" height="19" rx="2" stroke="currentColor" stroke-width="2"></rect> 
        <path d="M9 9H17" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path> 
        <path d="M9 13H17" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path> 
        <path d="M9 17H17" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path> </g>
      </svg>
      Orders</a>
    </li>
    
  </ul>

  <script>
      function toggleNav() {
          var sidenav = document.querySelector(".sidenav");
          var content = document.querySelector(".content");
          if (sidenav.style.transform === "translateX(-100%)") {
              sidenav.style.transform = "translateX(0%)";
              content.classList.add("ml-48");
      
          } else {
              sidenav.style.transform = "translateX(-100%)";
              content.classList.remove("ml-48");
          }
      }
  </script>

</aside>