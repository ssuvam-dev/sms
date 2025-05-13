<?php

namespace App\Models;

use App\Traits\TeamRelation;
use Illuminate\Database\Eloquent\Model;

class AcademicSession extends Model
{
    use TeamRelation;
    protected $fillable =[
        'team_id',
        'name',
        'start_date',
        'end_date',
        'data'
    ];

    protected $casts =[
        'data' => "json"
    ];
}
