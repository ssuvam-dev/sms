<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // relation with academic session
    public function academicSessions():HasMany
    {
        return $this->hasMany(AcademicSession::class);
    }
    // relation with classRoom
    public function classRooms():HasMany
    {
        return $this->hasMany(ClassRoom::class);
    }
    // relation with academic session
    public function sections():HasMany
    {
        return $this->hasMany(Section::class);
    }
}
