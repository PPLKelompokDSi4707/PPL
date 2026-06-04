<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['name', 'description', 'location', 'category', 'environment_status', 'lat', 'lng', 'bmkg_adm4', 'image_url'];

    public function mapLayers()
    {
        return $this->hasMany(MapLayer::class);
    }

    public function biotaData()
    {
        return $this->hasOne(BiotaData::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}