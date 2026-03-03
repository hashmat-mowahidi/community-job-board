<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ListingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserListingController extends Controller
{
    public function __construct(
        private readonly ListingService $listingService
    ) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->validate([
            'per_page' => 'integer|min:1|max:100'
        ])['per_page'] ?? 10;

        $listings = $this->listingService->getListingForUser(
            user: Auth::user(),
            search: $request->query('search'),
            perPage: $perPage
        );
        return response()->json([
            'status' => 'success',
            'listing' => $listings
        ], 200);
    }
}
