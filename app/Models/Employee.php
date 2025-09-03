<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'employee_id';
    protected $fillable = ['first_name', 'last_name', 'email', 'salary', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}