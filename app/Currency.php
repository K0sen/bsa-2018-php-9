<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency.
 *
 * @property int     $id
 * @property string  $title
 * @property string  $short_name
 * @property string  $logo_url
 * @property float   $price
 *
 * @package App
 */
class Currency extends Model
{
    protected $table = 'currency';

    protected $casts = [
        'price' => 'float',
    ];

    protected $fillable = [
        'title',
        'short_name',
        'logo_url',
        'price'
    ];
}