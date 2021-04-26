<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Equipment;

class History extends Model
{
    public $table = "histories";

    protected $fillable = [
        'user_id',
        'equipment_id',
        'status',
    ];

    public function User()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function Equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}
