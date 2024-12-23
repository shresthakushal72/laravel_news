<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    //

    public function __construct()
    {
        $company = Company::first();
        $categories = Category::orderBy('position', 'asc')->get();
        view::share([
            'company' => $company,
            'categories' => $categories,
        ]);
    }


    public function home()
    {
        $latest_post = Post::orderBy('id', 'desc')->where('status', 'approved')->first();

        $trending_posts = Post::orderBy('views', 'desc')->where('status', 'approved')->take(8)->get();

        return view('frontend.home', compact('latest_post', 'trending_posts'));
    }
}
