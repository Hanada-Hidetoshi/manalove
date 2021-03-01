<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectData extends Model
{
    // use HasFactory;
    protected $table = 'subject_datas';
    protected $fillable = [
        'classfication','subject_name','classfication_name'
        ];
    protected $guarded = [
        'id','created_at'
        ];
}
