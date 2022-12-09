<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // returns the user that created the project
    public function owner()
    {
        return $this->belongsTo(User::class)->get();
    }

    //returns the company that the creator belongs to
    public function pcompany()
    {
        return $this->belongsTo(User::class)->company();
    }

    // Returns project unique id
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    // creates like query for database with tag content.
    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
    }
}
