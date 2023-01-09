<x-app-layout>
    <div class="max-w-7xl mx-auto">

    @php($rating = 3.5)

    <div class="flex">
  <!-- full stars -->
  @for ($i = 1; $i <= floor($rating); $i++)
    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" role="presentation" class="w-6 h-6 text-yellow-500">
      <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="currentColor"></path>
    </svg>
  @endfor
  <!-- half star -->
  @if ($rating - floor($rating) >= 0.5)
  <svg class="w-6 h-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
    <defs>
      <linearGradient id="grad">
        <stop offset="50%" stop-color="currentColor"/>
        <stop offset="50%" stop-color="white" stop-opacity="1"/>
      </linearGradient>
    </defs>
    <path fill="url(#grad)" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
  </svg>
    @endif
  <!-- empty stars -->

    @for ($i = 1; $i <= (5 - ceil($rating)); $i++)
    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" role="presentation" class="w-6 h-6 text-gray-300">
    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="#000000"></path>
    </svg>
    @endfor
    </div>

    

    <div>
        Form
        <br>
        <br>
    <form action="{{route('review.store')}}" method="POST">
    @csrf
    <label for="product_id"> Product Id:</label><br>
  <input type="text" id="product_id" name="product_id"><br>
  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title"><br>
  <label for="stars">Number of Stars:</label><br>
  <input type="number" id="stars" name="stars"><br>
  <label for="name">Your Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="review">Review:</label><br>
  <textarea id="review" name="review"></textarea><br>
  <input type="checkbox" id="like" name="like" value="like">
  <label for="like">I liked this product</label><br>
  <input type="checkbox" id="dislike" name="dislike" value="dislike">
  <label for="dislike">I disliked this product</label><br>
  <input type="checkbox" id="flagged" name="flagged" value="flagged">
  <label for="flagged">Flag this review</label><br>
  <input type="submit" value="Submit">
    </form> 
    </div>

    <div class="mt-8">

    Display Reviews
    <br>
    <div>
    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500">
  <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="currentColor" clip-path="url(#clip)"></path>
  <!-- clip path to define the visible area -->
  <clipPath id="clip">
    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" transform="translate(0, 12) rotate(90)scale(1, 1)"></path>
  </clipPath>
</svg>
    </div>
    <br>
    <div>
    <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="256px" height="256px" viewBox="0 0 32 32">
    <defs>
      <linearGradient id="grad">
        <stop offset="50%" stop-color="currentColor"/>
        <stop offset="50%" stop-color="gray" stop-opacity="1"/>
      </linearGradient>
    </defs>
    <path fill="url(#grad)" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
  </svg>
    </div>
    </div>
    {{ $reviews }}<br>
    <br>
    <x-reviews :reviews=$reviews />


    </div>
</x-app-layout>