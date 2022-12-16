<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membros extends Model
{
    use HasFactory;

    protected $dates = [
        'data-nascimento',
        'data-entrada'
    ];

    protected $dateFormat = 'm-d-Y';
}
