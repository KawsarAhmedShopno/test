<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'id');
    }
}
