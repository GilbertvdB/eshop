<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {   
        $reviews = Review::all();

        return view('reviews', compact('reviews'));
    }

    public function store(Request $request)
    {   
        // Validate the request data
        $validatedData = $request->validate([
        'title' => 'required|max:255',
        'name' => 'required|max:255',
        'review' => 'required',
        'stars' => 'required|integer|min:1|max:5'
    ]);

    // Create a new review instance
    $review = new Review;
    $review->product_id = $request->product_id;
    $review->title = $request->title;
    $review->name = $request->name;
    $review->review = $request->review;
    $review->stars = $request->stars;
    $review->likes = $request->like;
    $review->dislikes = $request->dislike;
    $review->flagged = $request->flagged;

    // Save the review to the database
    $review->save();

    // Redirect the user back to the page with a success message
    return redirect()->back()->with('success', 'Your review has been added!');
}

}
