<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = [
        'cource',
        'specialization',
        'from_date',
        'to_date',
        'currently_study',
        'collage_name',
        'description',
        'mini_project',
        'major_project'
    ];
}
