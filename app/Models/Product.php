<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'slug',
        'status',
        'views',
        'sale_price',
        'description',
        'photo_0',
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
        'user_id'
    ];
}
