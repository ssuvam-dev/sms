<?php
namespace App\Traits;

use App\Models\Team;

trait TeamRelation
{
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}