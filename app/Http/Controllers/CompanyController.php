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
}
