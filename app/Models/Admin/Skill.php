<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = ['name', 'icon'];
}
