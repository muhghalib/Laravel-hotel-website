<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;
    
    protected $table="room_category";

    protected $fillable=[
        "name"
    ];
    protected $guarded=[
        "id"
    ];

    public function room(){
        return $this->hasMany(Room::class, 'room_category_id', 'id');
    }
}
