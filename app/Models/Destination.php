<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['name', 'location'];

    public function mapLayers()
    {
        return $this->hasMany(MapLayer::class);
    }
}