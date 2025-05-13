<?php

namespace App\Models;

use App\Traits\TeamRelation;
use Illuminate\Database\Eloquent\Model;

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
}
