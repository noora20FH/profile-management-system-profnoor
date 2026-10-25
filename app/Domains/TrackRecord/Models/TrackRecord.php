<?php

namespace App\Domains\TrackRecord\Models;

use Illuminate\Database\Eloquent\Model;

class TrackRecord extends Model
{
    protected $table = 'track_records';

    protected $fillable = [
        'type',
        'title',
        'institution',
        'scope',
        'details',
        'year',
        'sort_order',
    ];
}
