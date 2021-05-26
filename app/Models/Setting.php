<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipment;

class Setting extends Model
{
    public $table = "settings";

    protected $fillable = [
        'watering_time',
        'amount_of_water',
        'equipment_id',
        'humidity',
    ];

    public function Equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}
