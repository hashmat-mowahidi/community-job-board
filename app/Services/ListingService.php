<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class ListingService
{

    public function getListingForUser(User $user, ?string $search = null, int $perPage = 10): LengthAwarePaginator
    {
        $query = $user->listings()->with('tags')->latest();
        $query = $query->when($search, function ($q) use ($search) {
            $q->where(function ($innerQuery) use ($search) {
                $innerQuery->where('title', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%");
            });
        })->paginate($perPage);

        return $query;
    }
}
