<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorys = Category::all();
        return view('admin.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "eng_title" => "required|max:80",
            "nep_title" => "required|max:80",

        ]);

        $totalCategory = Category::count();
        $category = new Category();

        $category->eng_title = $request->eng_title;
        $category->nep_title = $request->nep_title;
        $category->position = $totalCategory + 1;
        $category->slug = Str::slug($request->eng_title);
        $category->save();
        toast('Record Added Successfully', 'success');
        return redirect(route('category.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "eng_title" => "required|max:80",
            "nep_title" => "required|max:80",
            "position" => "required|integer",

        ]);
        $category = Category::find($id);


        $category->eng_title = $request->eng_title;
        $category->nep_title = $request->nep_title;

        $existingCategory = Category::where('position', $request->position)
            ->where('id', '!=', $id) // Exclude the current category
            ->first();

        if ($existingCategory) {
            toast('Position already taken by another category.','error');
            // return redirect()->back();

        } else{
            $category->position = $request->position;
        }



        $category->update();
        toast('Record Updated Successfully', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id);

        // $tCategories = Category::where('position', '>', $category->position)->get();

        // foreach ($tCategories as $tcat) {
        //     $tcat->position = $tcat->position - 1;
        //     $tcat->update();
        // }


        $category->delete();
        toast('Record Deleted Successfully', 'success');
        return redirect()->back();
    }
}
