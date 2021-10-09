<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements \Maatwebsite\Excel\Concerns\ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $data = [
            'name'     => $row[0],
            'email'    => $row[1],
            'company_id'    => Company::firstWhere('name', $row[2])->id,
        ];

        $insertData = new Employee($data);

        return $insertData;
    }
}
