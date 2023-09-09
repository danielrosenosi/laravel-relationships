<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowPreferenceRequest;
use App\Http\Requests\StorePreferenceRequest;
use App\Http\Requests\UpdatePreferenceRequest;
use App\Http\Resources\PreferenceResource;
use App\Models\Preference;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PreferenceController extends Controller
{
    public function show(int $userId): PreferenceResource
    {
        $preference = Preference::where('user_id', $userId)->with('user')->first();

        return new PreferenceResource($preference);
    }

    public function index(): ResourceCollection
    {
        $preferences = Preference::with('user')->paginate();

        return PreferenceResource::collection($preferences);
    }

    public function store(StorePreferenceRequest $request): PreferenceResource
    {
        $preference = Preference::create($request->validated());

        return new PreferenceResource($preference);
    }

    public function update(UpdatePreferenceRequest $request, int $userId): PreferenceResource
    {
        $preference = Preference::where('user_id', $userId)->first();

        $preference->update($request->validated());

        return new PreferenceResource($preference);
    }
}
