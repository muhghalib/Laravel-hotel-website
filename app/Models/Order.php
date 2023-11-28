<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="room_order";

    protected $fillable=[ 
        "name",
        "user_id",
        "room_id",
        "order_code",
        "total_price",
        "check_in",
        "check_out",
        "total_room",
        'is_paid'
    ];

    protected $guarded=[
        'id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function room(){
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
