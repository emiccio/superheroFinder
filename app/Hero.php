<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public $timestamps = true;

    protected $table = 'heros';

    protected $fillable = [
        'external_id',
        'name',
        'fullName',
        'strength',
        'speed',
        'durability',
        'power',
        'combat',
        'race',
        'height0',
        'height1',
        'weight0',
        'weight1',
        'eyeColor',
        'hairColor',
        'publisher',
    ];
}
