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

    public function index(): JsonResponse
    {

        $listings = $this->listingService->getListingForUser(Auth::user());
        return response()->json([
            'status' => 'success',
            'listing' => $listings
        ], 200);
    }
}
