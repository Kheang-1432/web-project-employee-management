<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Make sure departments exist
        $itDept = Department::firstOrCreate(
            ['department_name' => 'IT'],
            ['description' => 'Handles software, hardware, and IT support.']
        );

        $hrDept = Department::firstOrCreate(
            ['department_name' => 'Human Resources'],
            ['description' => 'Handles recruitment and employee relations.']
        );

        // Clear employees table
        DB::table('employees')->truncate();

        // Seed employees (match only the columns you have)
        $employees = [
            [
                'first_name'    => 'Keo',
                'last_name'     => 'Mengkheang',
                'email'         => 'keo.mengkheang@example.com',
                'salary'        => 5000.00,
                'department_id' => $itDept->department_id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'first_name'    => 'Tha',
                'last_name'     => 'Sreymean',
                'email'         => 'tha.sreymean@example.com',
                'salary'        => 4500.00,
                'department_id' => $hrDept->department_id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'first_name'    => 'Som',
                'last_name'     => 'Vuttey',
                'email'         => 'som.vuttey@example.com',
                'salary'        => 4800.00,
                'department_id' => $itDept->department_id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'first_name'    => 'Touch',
                'last_name'     => 'Monyreach',
                'email'         => 'touch.monyreach@example.com',
                'salary'        => 4500.00,
                'department_id' => $hrDept->department_id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'first_name'    => 'Peung',
                'last_name'     => 'Seavpheng',
                'email'         => 'peung.seavpheng@example.com',
                'salary'        => 5200.00,
                'department_id' => $itDept->department_id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'first_name'    => 'Lay',
                'last_name'     => 'Seakchhong',
                'email'         => 'lay.seakchhong@example.com',
                'salary'        => 4300.00,
                'department_id' => $hrDept->department_id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        DB::table('employees')->insert($employees);
    }
}
