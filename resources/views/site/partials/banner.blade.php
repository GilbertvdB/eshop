<div class="mt-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
        <div class="flex justify-between py-4 px-4 rounded-lg h-14 bg-gradient-to-r from-rose-300 via-amber-300 to-green-600 ">
            <div>
                <span class="font-medium">Puzzling discount 10% with the purchase of 2 items or more.</span>
            </div>
            <div>
                <span class="font-medium">The sale ends in</span>
                <span class="font-medium px-2 py-2 bg-green-300 rounded-lg">2 days!</span>
            </div>
        </div>
    </div>

    </br>

    <div class="max-w-7xl h-64 mx-auto sm:px-6 lg:px-8">
        <div id="myCarousel">
            <div class="slides">
                <div class="slide active">
                    <a href="#target">
                    <div class="bg-blue-200 rounded-lg">
                        <div class="flex justify-between items-center px-24 h-64">
                            <div class="flex flex-col text-4xl">
                                <span>Puzzles & More,</span>
                                <span>The most puzzling of items.</span>
                            </div>   
                            <div class="transform hover:scale-105 transition duration-300 ease-in-out">
                                <img class="h-52" src="{{ asset('/images/puzzle1.png') }}" alt="Item 1">
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="bg-violet-200 rounded-lg">
                        <div class="flex justify-between items-center px-24 h-64">
                            <div class="flex flex-col text-4xl">
                                <span>Train your brain,</span>
                                <span>Endless hours of none stop fun.</span>
                            </div>   
                            <div class="transform hover:scale-105 transition duration-500 ease-in-out">
                                <img class="h-52" src="{{ asset('/images/puzzle2.png') }}" alt="Item 2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                <div class="bg-rose-200 rounded-lg">
                        <div class="flex justify-between items-center px-24 h-64">
                            <div class="flex flex-col text-4xl">
                                <span>Shop till you drop,</span>
                                <span>Wide range for the whole family.</span>
                            </div>   
                            <div class="transform hover:scale-105 transition duration-500 ease-in-out">
                                <img class="h-52" src="{{ asset('/images/puzzle3.png') }}" alt="Item 3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="relative -top-36 left-0 right-0">
                <div class="prev cursor-pointer bg-white rounded-full absolute w-10 h-10 text-black text-center pt-1 transform hover:scale-110 hover:text-pink-500 transition duration-200 ease-in-out" style="left: 4px;">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                        <path fill="currentcolor" d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                    </svg>
                </div>
                <div class="next cursor-pointer bg-white rounded-full absolute w-10 h-10 text-black text-center pt-1 pl-1 transform hover:scale-110 hover:text-pink-500 transition duration-200 ease-in-out" style="right: 4px;">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentcolor" d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </div>
            </div>

            <div class="relative -top-12" >
                <div class="flex justify-center items-center mt-6">
                <div id="dotContainer" class="flex">
                    <div class="w-2 h-2 bg-white rounded-full mx-2"></div>
                    <div class="w-2 h-2 bg-white rounded-full mx-2"></div>
                    <div class="w-2 h-2 bg-white rounded-full mx-2"></div>
                </div>    
                </div>
            </div>

        </div>
    </div>


    <style>

    .slides {
        display: flex;
        width: 100%;
        height: 100%;
    }
    .slide {
        display: none;
        width: 100%;
        height: 100%;
    }
    .slide.active {
        display: block;
    }
    
    </style>

    <script>
    let carousel = document.querySelector("#myCarousel");
    let slides = carousel.querySelectorAll(".slide");
    let dots = document.querySelectorAll("#dotContainer .rounded-full");
    let currentSlide = 0;

    function goToSlide(n) {
        slides[currentSlide].classList.remove("active");
        dots[currentSlide].classList.remove("bg-black");
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add("active");
        dots[currentSlide].classList.add("bg-black");
    }

    carousel.querySelector(".prev").addEventListener("click", function () {
        goToSlide(currentSlide - 1);
    });

    carousel.querySelector(".next").addEventListener("click", function () {
        goToSlide(currentSlide + 1);
    });

    setInterval(function() {
        goToSlide(currentSlide + 1);
    }, 4000);

    </script>

    </br></br>
    <div>

    </div>

</div>