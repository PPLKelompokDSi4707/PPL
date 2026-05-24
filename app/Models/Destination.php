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
}