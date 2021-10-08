<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee', [
            "title" => 'Employee',
            "active" => 'employee',
            'companies' => Company::all(),
            "employees" => Employee::latest()->paginate(5)
        ]);
    }

    public function cetak_pdf()
    {
        $data = Employee::all();
        view()->share('employee', $data);
        $pdf = PDF::loadview('tables', $data);
        return $pdf->download('All Data.pdf');
    }

    public function proses(Request $request)
    {
        $id = $request->input('company_id');
        $daftar = Employee::latest()->where('company_id', $id)->paginate(5)->appends(request()->query());

        return view('details', [
            "title" => 'Employee',
            "active" => 'employee',
            "id" => $id,
            'companies' => Company::all(),
            "employees" => $daftar
        ]);
    }

    public function cetak_pdf_per_company(Request $request)
    {
        $id = request('category_id');
        $data = Employee::where('company_id', $id)->get();
        $name = Company::firstWhere('id', $id)->name;
        view()->share('employee', $data);
        $pdf = PDF::loadview('tables', $data);
        return $pdf->download('Data Company ' . $name . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create', [
            'title' => 'Add Employee',
            'active' => 'employee',
            'companies' => Company::all()
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company_id' => 'required',
            'email' => 'required|unique:employees|email:dns'
        ]);

        Employee::create($validatedData);

        return redirect('/employees')->with('success', 'New Employee Has ben added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'title' => 'Edit Employee',
            'active' => 'employee',
            'employees' => $employee,
            'companies' => Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'name' => 'required|max:255',
            'company_id' => 'required',
        ];

        if ($request->email != $employee->email) {
            $rules['email'] = 'required|unique:employees|email:dns';
        }

        $validatedData = $request->validate($rules);

        Employee::where('id', $employee->id)->update($validatedData);

        return redirect('/employees')->with('success', 'Employee Has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        return redirect('/employees')->with('success', 'Employee Has ben deleted!');
    }
}
