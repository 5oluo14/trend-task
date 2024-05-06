<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        $brands = Brand::all();

        return response()->json([
            'data' => BrandResource::collection($brands),
            'message' => 'Brands retrieved successfully'
        ], 200);
    }

}