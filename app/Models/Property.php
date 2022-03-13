<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'owner',
        'phone',
        'title',
        'slug',
        'porpouse',
        'type',
        'status',
        'views',
        'sale_price',
        'rent_price',
        'description',
        'area',
        'bedrooms',
        'bathrooms',
        'garage',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'photo',
        'planned_furniture',
        'barbecue_grill',
        'wifi',
        'air_conditioning',
        'bar',
        'american_kitchen',
        'office',
        'pool',
        'user_id'
    ];

    /**
     * Accessor and Mutators
     */

    public function setPlannedFurnitureAttribute($value)
    {
        $this->attributes['planned_furniture'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setWifiAttribute($value)
    {
        $this->attributes['wifi'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setAirConditioningAttribute($value)
    {
        $this->attributes['air_conditioning'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setBarAttribute($value)
    {
        $this->attributes['bar'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setBarbecueGrillAttribute($value)
    {
        $this->attributes['barbecue_grill'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setAmericanKitchenAttribute($value)
    {
        $this->attributes['american_kitchen'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setOfficeAttribute($value)
    {
        $this->attributes['office'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setPoolAttribute($value)
    {
        $this->attributes['pool'] = (($value === true || $value === 'on') ? 1 : 0);
    }
}
