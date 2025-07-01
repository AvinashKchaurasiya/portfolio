<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Experince extends Model
{
    protected $table = 'experinces';

    protected $fillable = [
        'title',
        'company',
        'location',
        'from_date',
        'to_date',
        'currently_working',
        'description'
    ];
}
