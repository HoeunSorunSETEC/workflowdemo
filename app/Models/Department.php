<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','name',
        // Add other fillable attributes as needed
    ];

    // Define the relationship with users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Define the relationship with mission requests
    public function missionRequests()
    {
        return $this->hasMany(MissionRequest::class);
    }
}
