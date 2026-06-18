<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapLayer extends Model
{
    protected $fillable = [
        'name', 'layer_type', 'description', 'color', 'fill_color', 
        'fill_opacity', 'stroke_weight', 'coordinates', 'destination_id', 
        'province_id', 'area_type', 'is_visible', 'created_by'
    ];

    protected $casts = [
        'coordinates' => 'array',
        'is_visible' => 'boolean',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
