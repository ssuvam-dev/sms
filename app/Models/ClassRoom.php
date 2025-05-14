<?php

namespace App\Models;

use App\Traits\TeamRelation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClassRoom extends Model
{
    use TeamRelation;
    protected $fillable =[
        'team_id',
        'name',
        'sort',
        'data'
    ];

    protected $casts =[
        'data' => "json"
    ];

    public function sections() :BelongsToMany
    {
        return $this->belongsToMany(Section::class,'class_sections');
    }
}
