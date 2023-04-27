<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_stundent extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function creater()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function classDetails()
    {
        return $this->belongsTo(Classes::class, 'classId');
    }
}
