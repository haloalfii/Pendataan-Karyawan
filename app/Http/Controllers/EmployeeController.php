<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee', [
            "title" => 'Employee',
            "active" => 'components',
            "employees" => Employee::latest()->paginate(5)
        ]);
    }

    public function create()
    {
        return view('employee.create', [
            'title' => 'Add Employee',
            'active' => 'components',
            'companies' => Company::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company_id' => 'required',
            'email' => 'required|unique:employees|email:dns'
        ]);

        Employee::create($validatedData);

        return redirect('/employees')->with('success', 'New Employee Has ben added!');
    }
}
