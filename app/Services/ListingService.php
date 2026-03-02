<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class ListingService
{

    public function getListingForUser(User $user): Collection
    {
        return $user->listings()->with('tags')->latest()->get();
    }
}
