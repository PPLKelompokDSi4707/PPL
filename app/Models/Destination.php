<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['name', 'location', 'bmkg_adm4'];

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