<?php

namespace App\Http\Controllers;

use App\Services\ListingService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListingController extends Controller
{
    public function __construct(
        private readonly ListingService $listingService
    ) {}

    public function index(): View
    {

        $listings = $this->listingService->getListingForUser(Auth::user());
        return view('listings.user', ['listings' => $listings]);
    }
}
