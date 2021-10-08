<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company', [
            "title" => 'Company',
            "active" => 'company',
            "companies" => Company::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create', [
            'title' => 'Add Company',
            'active' => 'company'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('company');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|file|max:2048|mimes:png|dimensions:min_width=100, min_height=100',
        ]);

        $validatedData['image'] = $request->file('image')->store('company');

        Company::create($validatedData);

        return redirect('/companies')->with('success', 'New Company Has ben added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', [
            'title' => 'Edit Company',
            'active' => 'company',
            'companies' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:2048|mimes:png|dimensions:min_width=100, min_height=100',
        ];

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('company');
        }
        Company::where('id', $company->id)->update($validatedData);

        return redirect('/companies')->with('success', 'Company Has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Company::destroy($company->id);
        return redirect('/companies')->with('success', 'Companies Has ben deleted!');
    }
}
