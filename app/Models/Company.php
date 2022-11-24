<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function projects()
    {
        return $this->hasManyThrough(Project::class, User::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
