<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Config extends Authenticatable
{
    use Notifiable;

    public $table = 'config';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'company',
        'address_title',
        'address_line1',
        'address_line2',
        'address_city',
        'address_state',
        'address_zipcode',
        'address_phone',
        'enable_registration'
    ];
}
