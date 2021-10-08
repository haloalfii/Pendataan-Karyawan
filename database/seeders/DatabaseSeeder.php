<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Company::create([
            'name' => 'Transisi Indonesia',
        ]);

        Company::create([
            'name' => 'Amikom',
        ]);

        Employee::factory(15)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@transisi.id',
            'password' => bcrypt('transisi')
        ]);
    }
}
