<?php

namespace App\Models;

use App\Traits\TeamRelation;
use Illuminate\Database\Eloquent\Model;

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
}
