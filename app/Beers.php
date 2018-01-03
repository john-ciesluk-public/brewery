<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Beers extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'ibu',
        'og',
        'abv',
        'available',
        'deleted',
        'calories',
        'slug',
        'pints_sold',
        'price'
    ];
}
