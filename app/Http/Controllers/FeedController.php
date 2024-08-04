<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Config\ConfiguredFeedProvider;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function __construct(
        protected ConfiguredFeedProvider $feedProvider,
    ) {
    }

    public function get(Request $request): JsonResponse
    {
        $url = $request->get('url', '');
        $feed = $this->feedProvider->get($url);
        if (is_null($feed)) {
            return response()->json(null, 404);
        }

        return response()->json($feed);
    }
}
