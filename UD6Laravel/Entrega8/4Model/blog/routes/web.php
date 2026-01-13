<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;

Route::get('/', function () {
   $posts = Post::published()->get(); // Fetch only published posts using the scope
    return view('posts.index', compact('posts')); // Pass the posts to the view
});

Route::get('/all', function () {
    $posts = Post::all(); // Fetch all posts including drafts
    return view('posts.index', compact('posts')); // Pass the posts to the view
});
