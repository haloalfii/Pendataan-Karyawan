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
            'slug' => 'transisi-indonesia'
        ]);

        Company::create([
            'name' => 'Amikom',
            'slug' => 'amikom'
        ]);

        Employee::factory(15)->create();

        Admin::create([
            'name' => 'Alfian Luthfi',
            'email' => 'admin@transisi.id',
            'password' => bcrypt('transisi')
        ]);
    }
}
