<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Equipment;

class Zone extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'slug',
        'description',
        'image',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Equipment()
    {
        return $this->hasMany(Equipment::class);
    }
}
