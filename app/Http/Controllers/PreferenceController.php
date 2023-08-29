<?php

namespace App\Http\Controllers;

use App\Http\Resources\PreferenceResource;
use App\Models\Preference;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PreferenceController extends Controller
{
    public function index(): ResourceCollection
    {
        $preferences = Preference::with('user')->paginate();

        return PreferenceResource::collection($preferences);
    }
}
