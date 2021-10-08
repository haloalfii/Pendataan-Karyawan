<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ShowDashboard()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }

    public function ShowCompany()
    {
        return view('company', [
            'title' => 'Company',
            'active' => 'components'
        ]);
    }

    public function ShowEmployee()
    {
        return view('employee', [
            'title' => 'Employee',
            'active' => 'components'
        ]);
    }
}
