<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']) . '-' . Str::lower(Str::random(5));

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $path;
        }

        try {
            return DB::transaction(function () use ($data, $request) {

                $listing = $request->user()->listings()->create($data);

                $tagIds = collect(explode(',', $data['tags']))
                    ->map(fn($t) => trim(strtolower($t)))
                    ->filter()
                    ->unique()
                    ->map(function ($tagName) {
                        $tag = Tag::firstOrCreate(
                            ['name' => $tagName],
                            ['slug' => Str::slug($tagName)]
                        );
                        return $tag->id;
                    });

                $listing->tags()->sync($tagIds);

                return redirect()->route('listings.show', [$listing])
                    ->with('success', 'Job posted successfully!');
            });
        } catch (\Exception $e) {
            Log::error("Failed to create Listing" . $e->getMessage());

            return back()->withInput()
                ->withErrors(['error' => 'Something went wrong. Please try again.' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $listing->load('tags');
        return view('listings.show', ['listing' => $listing]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        Gate::authorize('update', $listing);
        $listing->tags = $listing->tags->pluck('name')->implode(', ');
        return view('listings.edit', ['listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        Gate::authorize('update', $listing);
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($listing->logo) {
                FacadesStorage::disk('public')->delete($listing->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $path;
        }

        $listing->update($data);

        if ($request->has('tags')) {
            $tagIds = collect(explode(',', $request->tags))
                ->map(fn($t) => trim(strtolower($t)))
                ->filter()
                ->map(function ($name) {
                    return Tag::firstOrCreate(
                        ['name' => $name],
                        ['slug' => str()->slug($name)]
                    )->id;
                });

            $listing->tags()->sync($tagIds);
        }

        return redirect()
            ->route('listings.show', ['listing' => $listing])
            ->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {

        Gate::authorize('delete', $listing);
        if ($listing->logo) {
            FacadesStorage::disk('public')->delete($listing->logo);
        }

        $listing->delete();

        return redirect()->route('home')
            ->with('success', 'Job deleted successfully!');
    }
}
