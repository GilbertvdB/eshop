<x-app-layout>
    html/css
    <!--
    <style>
        .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style the button that is used to open the side navigation */
button {
  font-size: 24px;
  background-color: #111;
  color: #f1f1f1;
  border: none;
  padding: 10px 15px;
  cursor: pointer;
}

button:hover {
  background-color: #444;
}

</style>

    <div>
    <div class="sidenav">
    <a href="#">Link 1</a>
    </div>

    <button onclick="openNav()">Open SideNav</button>



    </div>

    <script>
        function openNav() {
            document.querySelector(".sidenav").style.width = "250px";
            }

            function closeNav() {
            document.querySelector(".sidenav").style.width = "0";
            }
    </script>   
        -->
        
     <div>    
    
     <!-- working using width
     <div class="sidenav fixed h-full w-0 top-10 left-0 z-10 bg-gray-900 overflow-x-hidden transition-all duration-500">
        <a href="#" class="block px-8 py-4 text-gray-400 text-lg font-medium hover:text-white transition duration-300">The Dashboard</a>
        <a href="#" class="block px-8 py-4 text-gray-400 text-lg font-medium hover:text-white transition duration-300">These Settings</a>
        <a href="#" class="block px-8 py-4 text-gray-400 text-lg font-medium hover:text-white transition duration-300">Where Categories</a>
    </div>       

    <button class="ml-64 px-4 py-2 text-lg font-medium text-white bg-black focus:outline-none hover:bg-gray-700" onclick="toggleNav()">
        Open/Close SideNav</button>

     </div>       

     <script>
     function toggleNav() {
            var sidenav = document.querySelector(".sidenav");
            if (sidenav.classList.contains("w-60")) {
            sidenav.classList.remove("w-60");
            sidenav.classList.add("w-0");
            } else {
            sidenav.classList.remove("w-0");
            sidenav.classList.add("w-60");
            }
        }
    </script>   -->

    <!--- menu code moves in out of screen
    <div>

    <div class="sidenav fixed h-full top-10 left-0 z-10 bg-gray-900 overflow-x-hidden transition-all duration-500" style="transform: translateX(-100%)">
    <a href="#" class="block px-8 py-4 text-gray-400 text-lg font-medium hover:text-white transition duration-300">The Dashboard</a>
    <a href="#" class="block px-8 py-4 text-gray-400 text-lg font-medium hover:text-white transition duration-300">These Settings</a>
    <a href="#" class="block px-8 py-4 text-gray-400 text-lg font-medium hover:text-white transition duration-300">Where Categories</a>
</div>

<button class="ml-64 px-4 py-2 text-lg font-medium text-white bg-black focus:outline-none hover:bg-gray-700" onclick="toggleNav()">Open/Close SideNav</button>

<script>
function toggleNav() {
    var sidenav = document.querySelector(".sidenav");
    if (sidenav.style.transform === "translateX(0%)") {
        sidenav.style.transform = "translateX(-100%)";
    } else {
        sidenav.style.transform = "translateX(0%)";
    }
}
</script>
    </div>
        -->

        <div class="flex">
  <!-- Sidebar -->
  <div class="w-1/4 bg-gray-200 h-screen">
    <ul class="mt-8">
      <li class="mb-4"><a href="#" class="text-gray-700 hover:text-gray-900" onclick="showTab('tab1')">Link 1</a></li>
      <li class="mb-4"><a href="#" class="text-gray-700 hover:text-gray-900" onclick="showTab('tab2')">Link 2</a></li>
    </ul>
  </div>

  <!-- Content -->
  <div class="w-3/4 p-8">

    <!-- Tab 1 -->
    <div id="tab1" class="mt-8">
      <h2 class="text-xl font-semibold mb-4">Tab 1 content goes here</h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel lacus sit amet purus tristique bibendum. Vivamus bibendum lacinia risus, id pretium purus finibus id. </p>
    </div>

    <!-- Tab 2 -->
    <div id="tab2" class="mt-8 hidden">
      <h2 class="text-xl font-semibold mb-4">Tab 2 content goes here</h2>
      <p> Ut at tellus hendrerit, fringilla nunc eget, posuere tortor. Nullam vel urna vel magna feugiat fermentum vitae ac elit. Duis facilisis erat eu est feugiat, eget ullamcorper mi fringilla. </p>
    </div>
  </div>
</div>

<script>
  function showTab(tabId) {
    const tabs = document.querySelectorAll('#tab1, #tab2');
    tabs.forEach(tab => {
      if (tab.id === tabId) {
        tab.classList.remove('hidden');
      } else {
        tab.classList.add('hidden');
      }
    });
  }
</script>

        </div>

        <!-- tailwind css
        <div class="fixed inset-0 z-50 bg-black opacity-50" onclick="closeNav()"></div>

        <div id="sidenav" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full transition duration-300 ease-in-out">
        <div class="flex items-center justify-between p-4">
            <span class="text-lg font-medium">Side Navigation</span>
            <button onclick="closeNav()" class="text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M18 6L6 18M6 6l12 12"></path>
            </svg>
            </button>
        </div>
        
        <nav class="px-4 pt-4 pb-8">
            <!-- Your navigation links here --
        </nav>
        </div>

        <script>
        function openNav() {
            document.getElementById("sidenav").classList.remove("-translate-x-full");
        }

        function closeNav() {
            document.getElementById("sidenav").classList.add("-translate-x-full");
        }
        </script>
        -->
    



</x-app-layout>