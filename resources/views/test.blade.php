<x-app-layout>
    <div class="max-w-7xl mx-auto">

        <div class="container">
            <div>
                <a class="div1" href="#">This the link</a>
            </div>    
            <div class="w-20 h-20 bg-blue-500">
                Helo World
            </div>
            <div class="div2 w-20 h-20 bg-red-500 transition duration-300 ease-in-out">
                Im big
            </div>
        </div>


<script>
const div1 = document.querySelector(".div1");
const div2 = document.querySelector(".div2");

div1.addEventListener("mouseenter", function () {
  div2.style.transform = "scale(1.5)";
});

div1.addEventListener("mouseleave", function () {
  div2.style.transform = "scale(1)";
});
</script>

    </div>
</x-app-layout>