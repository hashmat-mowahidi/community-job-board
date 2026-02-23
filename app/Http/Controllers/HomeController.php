<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all();
        $selectedTags = (array) $request->input('tag', []);
        $listings = Listing::latest()
            ->with('tags')
            ->when($selectedTags, function ($query, $tags) {
                $query->whereHas('tags', fn($q) => $q->whereIn('slug', $tags));
            })
            ->paginate(10)
            ->withQueryString();

        return view('home', [
            'listings' => $listings,
            'tags' => $tags,
            'selectedTags' => $selectedTags
        ]);
    }
}
