<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function categories(){
        $categories = Category::orderBy('position', 'asc')->get();

        // return response()->json($categories);
        // if array then ::collection
        return CategoryResource::collection($categories);
    }
}
