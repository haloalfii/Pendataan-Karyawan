<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

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
}
