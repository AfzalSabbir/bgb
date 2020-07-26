<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    	'name', 'roll', 'father_name', 'mother_name', 'student_mobile', 'guardian_mobile', 'dob',
    	'religion', 'gender', 'blood_group', 'present_address', 'permanent_address', 'class', 'group',
    	'year', 'shift', 'status', 'fouth_subject', 'photo'
    ];
}
