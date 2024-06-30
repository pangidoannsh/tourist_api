<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function facilities()
    {
        return $this->hasMany(Facility::class, "tourist_id", "id");
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class, "tourist_id", "id");
    }

    public function getIsFavoriteAttribute()
    {
        // return $this->favorite()->where('user_id', $user->id)->exists();
    }
}
