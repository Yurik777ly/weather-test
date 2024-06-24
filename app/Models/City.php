<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'cities';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'default',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
