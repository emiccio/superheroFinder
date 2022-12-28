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
        'height_0',
        'height_1',
        'weight_0',
        'weight_1',
        'eyeColor',
        'hairColor',
        'publisher',
    ];
}
