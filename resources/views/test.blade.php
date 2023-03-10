<x-app-layout>
    <div>
    
    </div>

    <div class="mt-10">

    <div class="flex">
  <div class="border border-gray-300 bg-gray-100 w-1/5 h-72">
    <button class="block bg-transparent text-black py-5 px-4 w-full text-left focus:outline-none hover:bg-gray-200 active:bg-gray-300" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
    <button class="block bg-transparent text-black py-5 px-4 w-full text-left focus:outline-none hover:bg-gray-200 active:bg-gray-300" onclick="openCity(event, 'Paris')">Paris</button>
    <button class="block bg-transparent text-black py-5 px-4 w-full text-left focus:outline-none hover:bg-gray-200 active:bg-gray-300" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  </div>

  <div id="London" class="tabcontent border border-gray-300 w-4/5 h-72 hidden">
    <h3 class="text-2xl font-bold">London</h3>
    This is Analytics
      @include('admin.settings.includes.general')
  </div>

  <div id="Paris" class="tabcontent border border-gray-300 w-4/5 h-72 hidden">
    <h3 class="text-2xl font-bold">Paris</h3>
    This is Analytics
      @include('admin.settings.includes.analytics')
  </div>

  <div id="Tokyo" class="tabcontent border border-gray-300 w-4/5 h-72 hidden">
    <h3 class="text-2xl font-bold">Tokyo</h3>
    This is Analytics
      @include('admin.settings.includes.payments')
  </div>
</div>


<script>

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the link that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
} 

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

</script>
    </div>
</x-app-layout>