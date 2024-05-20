<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'countryCode',
        'countryName',
    ];

    public static function data()
    {
        return self::all()->map(function ($country){
            return [
                'code' => $country->countryCode,
                'name' => $country->countryName,
            ];
        });
    }

    public function cities()
    {
        return $this->hasMany(City::class,'countryId','id');
    }
}
