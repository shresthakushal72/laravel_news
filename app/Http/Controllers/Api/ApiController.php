<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
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

    public function company(){
        $company = Company::first();
        return new CompanyResource($company);
    }

    public function trending_posts(){

        $trending_posts = Post::orderBy('views', 'desc')->where('status', 'approved')->take(8)->get();
        return PostResource::collection($trending_posts);
    }
}
