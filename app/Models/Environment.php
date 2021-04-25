<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipment;

class Environment extends Model
{
    protected $fillable = [
        'equipment_id',
        'temperature',
        'humidity',
    ];

    public function Equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }

}
