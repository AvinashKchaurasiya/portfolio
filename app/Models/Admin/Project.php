<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_name',
        'url',
        'thumbnail',
        'service_id',
        'technology',
        'description'
    ];

    /**
     * Get the service that owns the project.
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Admin\Service', 'service_id');
    }
}
