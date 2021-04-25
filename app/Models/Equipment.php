<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Zone;
use App\Models\Setting;

class Equipment extends Model
{
    protected $fillable = [
        'zone_id',
        'slug',
        'name',
        'token',
        'description',
        'image',
        'status',
    ];

    public function Zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function Setting()
    {
        return $this->hasOne(Setting::class);
    }
}
