<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //returns all users that belong to user_role role
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_role');
    }
}
