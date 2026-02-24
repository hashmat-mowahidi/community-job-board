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
        $searchTerm = $request->input('search');

        $listings = Listing::latest()
            ->with('tags')
            ->when($selectedTags, function ($query, $tags) {
                $query->whereHas('tags', fn($q) => $q->whereIn('slug', $tags));
            })
            ->when($searchTerm, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('company_name', 'like', "%{$search}%");
                });
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
