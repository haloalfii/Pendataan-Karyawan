<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company', [
            "title" => 'Company',
            "active" => 'components',
            "companies" => Company::latest()->paginate(5)
        ]);
    }

    public function create()
    {
        return view('company.create', [
            'title' => 'Add Company',
            'active' => 'components'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Company::create($validatedData);

        return redirect('/companies')->with('success', 'New Company Has ben added!');
    }
}
