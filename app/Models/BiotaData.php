<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiotaData extends Model
{
    protected $table = 'biota_data';
    protected $guarded = [];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
