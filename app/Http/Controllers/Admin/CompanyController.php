<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // go to index page : company.index
    $company = Company::first();

        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // create form page
        $company = Company::first();
       if(!$company){
        return view('admin.company.create');
       } else{
        return redirect()->back();
       }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store data in DB : company.store

        $request->validate([
            "name" => "required | max:80",
            "email" => "required|email",
            "phone" => "required|digits:10",
            "tel" => "required",
            "facebook" => "max:255",
            "instagram" => "max:255",
            "logo" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:3024",
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone	= $request->phone;
        $company->tel = $request->tel;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;


        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = time(). '.' . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $company->logo = 'images/' . $fileName;
        }


        $company->save();
        toast('Record Added Successfully','success');
        return redirect()->route('company.index');



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
        //Go to edit page : company.edit
        $company = Company::first();

        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update the data after going to edit page : company.update

        $request->validate([
           "name" => "required | max:80",
            "phone" => "required",
            "tel" => "required",
            "email" => "required|email",
            "facebook" => "max:255",
            "instagram" => "max:255",
            // "logo" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:4024",

        ]);


        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone	= $request->phone;
        $company->tel = $request->tel;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;


        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = time(). '.' . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $company->logo = 'images/' . $fileName;
        }

        $company->update();
        toast('Record Updated Successfully','success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete Data : company.destroy

        $company = Company::find($id);
        $company->delete();
        toast('Record Deleted Successfully','success');
        return redirect()->back();
    }
}
