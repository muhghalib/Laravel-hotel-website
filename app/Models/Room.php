<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table="room";
    protected $fillable=[
        "image",
        "room_category_id",
        "price",
        "description",
        "max_guest",
        "available_room",
        "total_bed_room",
        "total_bath_room",
        "king_bed",
        "twin_bed",
        "ac",
        "bathtub",
        "refrigator",
        "television",
        "wifi",
        "minibar",
        "kitchen",
        "include_breakfast"
    ];
    protected $guard=[
        "id"
    ];

    public function category(){
        return $this->belongsTo(RoomCategory::class, 'room_category_id', 'id');
    }
}
