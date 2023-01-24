<div class="border-b border-gray-100 mt-4">
    <div class="container max-w-7xl h-64 mx-auto px-4 sm:px-6 lg:px-8 bg-amber-200">
        <div class="text-4xl">
            Sale Sale Sale
        </div>    
        <div class="bg-red-500 text-white py-2 px-4 rounded-lg">
  <span class="text-xl font-medium">Sale</span>
</div>

<div class="relative overflow-hidden">
  <div class="carousel-item w-full h-full">
    <img src="item1.jpg" alt="Item 1" class="w-full h-full object-cover">
  </div>
  <div class="carousel-item w-full h-full hidden">
    <img src="item2.jpg" alt="Item 2" class="w-full h-full object-cover">
  </div>
  <div class="carousel-item w-full h-full hidden">
    <img src="item3.jpg" alt="Item 3" class="w-full h-full object-cover">
  </div>
  <button class="bg-white text-black p-2 rounded-lg hover:bg-gray-200 previous">Previous</button>
  <button class="bg-white text-black p-2 rounded-lg hover:bg-gray-200 next">Next</button>
</div>

<script>

$(document).ready(function(){
  
  var currentIndex = 0;
  var items = $('.carousel-item');
  var itemAmt = items.length;

  function cycleItems() {
    var item = $('.carousel-item').eq(currentIndex);
    items.addClass('hidden');
    item.removeClass('hidden');
  }

  // Next button
  $('.next').click(function(){
    currentIndex += 1;
    if (currentIndex > itemAmt - 1) {
      currentIndex = 0;
    }
    cycleItems();
  });

  // Previous button
  $('.previous').click(function(){
    currentIndex -= 1;
    if (currentIndex < 0) {
      currentIndex = itemAmt - 1;
    }
    cycleItems();
  });
});

</script>
    
    </div>
</div>