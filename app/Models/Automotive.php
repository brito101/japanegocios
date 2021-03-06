<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Automotive extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'owner',
        'phone',
        'title',
        'slug',
        'category',
        'brand',
        'model',
        'status',
        'views',
        'sale_price',
        'description',
        'year',
        'mileage',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'photo_0',
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
        'gear',
        'fuel',
        'user_id'
    ];
}
