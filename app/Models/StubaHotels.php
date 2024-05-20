<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StubaHotels extends Model
{
    use HasFactory;
//    protected $fillable = ['id', 'name', 'region', 'type', 'address', 'stars', 'general_info', 'photo', 'description', 'amenity', 'rating', 'rank'];
    protected $fillable = ['Id', 'Name', 'Region', 'Type', 'Address', 'Stars', 'GeneralInfo', 'Photo', 'Description', 'Amenity', 'Rating', 'Rank'];


    // If some attributes are JSON, you can cast them to array
    protected $casts = [
        'Id'=>'string',
        'Region' => 'array',
        'Address' => 'array',
        'GeneralInfo' => 'array',
        'Photo' => 'array',
        'Description' => 'array',
        'Amenity' => 'array',
        'Rating' => 'array',
    ];
}
