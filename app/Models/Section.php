<?php

namespace App\Models;

use App\Traits\TeamRelation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
{
    use TeamRelation;
    
    protected $fillable =[
        'team_id',
        'name',
        'data'
    ];

    protected $casts =[
        'data' => "json"
    ];

     public function classRooms() :BelongsToMany
    {
        return $this->belongsToMany(ClassRoom::class,'class_sections');
    }
}
