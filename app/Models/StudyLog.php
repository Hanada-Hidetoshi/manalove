<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyLog extends Model
{
    // use HasFactory;
    protected $table = 'study_logs';
    protected $fillable = [
        's_id','s_name','subject','subject','elapsed_time','implimantation','updated_at'
        ];
    protected $guarded = [
        'id','created_at'
        ];
}
