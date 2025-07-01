<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $table = 'technologies';

    protected $fillable = [
        'name',
        'description',
        'icon',
    ];
}
