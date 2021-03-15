<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    // use HasFactory;
    protected $table = 'test_results';
    protected $fillable = [
        'test_id','subject_name','implimantation','subject_id','s_id','test_name','score',
        ];
    protected $guarded = [
        'id','created_at'
        ];
}
