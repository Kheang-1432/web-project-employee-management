<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['department_name' => 'Human Resources', 'description' => 'Handles recruitment and employee relations.'],
            ['department_name' => 'IT', 'description' => 'Handles software, hardware, and IT support.'],
            ['department_name' => 'Finance', 'description' => 'Manages budgets, accounts, and salaries.'],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}