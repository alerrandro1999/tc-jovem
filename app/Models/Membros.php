<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membros extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $dates = [
        'data_nascimento',
        'data_entrada'
    ];

    // protected $dateFormat = 'm-d-Y';

    public static function getAtivos()
    {
        return Membros::where('status', 1)
            ->count();
    }

    public static function getInativos()
    {
        return Membros::where('status', 2)
            ->count();
    }

    public static function getCountAniversariantes()
    {
        return Membros::whereMonth('data_nascimento', Carbon::now()->month)
                  ->orderByRaw('day(data_nascimento) asc')->count();
    }

    public static function getAniversariantes()
    {
        return Membros::whereMonth('data_nascimento', Carbon::now()->month)
                  ->orderByRaw('day(data_nascimento) asc')->get();
    }

    public static function getDayAniversariantes()
    {
        return Membros::whereDay('data_nascimento', Carbon::now()->day)
                  ->orderByRaw('day(data_nascimento) asc')->get();
    }
}