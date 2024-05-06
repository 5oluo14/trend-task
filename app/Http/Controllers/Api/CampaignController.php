<?php

namespace App\Http\Controllers\Api;

use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignRequest;
use App\Http\Resources\CampaignResource;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::with('brand')->paginate();
        return response()->json([
            'data' => CampaignResource::collection($campaigns),
            'message' => 'success',
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CampaignRequest $request)
    {
        $campaign = Campaign::create($request->validated()->except('file'));

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('campaigns', 'public');
            $campaign->file_path = $path;
            $campaign->save();
        }
        return response()->json([
            'data' => new CampaignResource($campaign),
            'message' => 'success',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        return response()->json([
            'data' => new CampaignResource($campaign),
            'message' => 'success',
        ], 200);
    }

}