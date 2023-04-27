<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function studentDetails()
    {
        return $this->belongsTo(add_stundent::class, 'student_id');
    }
    public function classDetails()
    {
        return $this->belongsTo(Classes::class, 'classId');
    }
}
