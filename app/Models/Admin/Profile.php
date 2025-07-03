<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'name',
        'image',
        'linkedin_url',
        'website',
        'location',
        'mobile',
        'email',
        'resume'
    ];
}
