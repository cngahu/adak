<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationQualifications extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function assign_academiclevel(){
        return $this->belongsTo(AcademicLevels::class,'academiclevel','id');
    }
    public function assign_grade(){
        return $this->belongsTo(Grades::class,'grade','id');
    }

}
