<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function newInit(array $newDetails, $touristId)
    {
        // Dump old data
        self::where("tourist_id", $touristId)->delete();
        // init new data
        foreach ($newDetails as  $detail) {
            Facility::create([
                "tourist_id" => $touristId,
                "detail" => $detail
            ]);
        }
    }
}
