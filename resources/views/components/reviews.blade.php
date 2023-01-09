<div>
    <div>
        <div class="font-bold text-xl mb-2">Reviews:</div>
    <!-- If there is no review -->
    @if($reviews->isEmpty())
        <p> No reviews yet. </p>
    
    <!-- Show Title Review average -->
    @else    
        <div class="flex items-center">
            <div class="text-4xl px-2">{{ $reviews->avg('stars') }}</div>
            <div class="flex">
            @php($rating = $reviews->avg('stars'))
                <!-- full stars -->
            @for ($i = 1; $i <= floor($rating); $i++)
                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" role="presentation" class="w-6 h-6 text-yellow-500">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="currentColor"></path>
                </svg>
            @endfor
            <!-- half star -->
            @if ($rating - floor($rating) >= 0.1)
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
        
            </div>
        </div>
    </div>

    <!-- Display the reviews -->
    <div class="">
    @foreach($reviews as $review)
    <div class="border mb-4 py-4 px-4">
    
    <!-- Display the title -->
    <h3 class="text-xl font-bold text-gray-900">{{ $review->title }}</h3>

    <!-- Display the number of stars -->
    <div class="flex">
    @for($i = 0; $i < $review->stars; $i++)
        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" role="presentation" class="w-4 h-4 text-yellow-500">
        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="currentColor"></path>
        </svg>
    @endfor
    </div>

    <!-- Display the name & display the date the review was created -->
    <p class="text-gray-500 text-sm">by {{ $review->name }} <span class="text-gray-500"> | {{ $review->created_at->format('F d, Y') }}</span></p>

    <!-- Display the review -->
    <p class="text-gray-900 my-4">{{ $review->review }}</p>

    <!-- Like Button -->
    <button class="p-2">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z" fill="#00C853"/>
    </svg>
    </button>
    {{ $review->likes }}

    <!-- Dislike Button -->
    <button class="p-2">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v1.91l.01.01L1 14c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.59-6.59c.36-.36.58-.86.58-1.41V5c0-1.1-.9-2-2-2zm4 0v12h4V3h-4z" fill="#D50000"/>
    </svg>
    </button>
    {{ $review->dislikes }}

    <!-- Report the review -->
    <a href="" class="text-gray-700 text-sm my-4 ml-4">Report review!</a>
    </div>
    @endforeach
    @endif
    </div>
    <br>
    
</div>