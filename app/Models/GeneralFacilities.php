<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralFacilities extends Model
{
    use HasFactory;

    protected $table="general_facilities";
    protected $fillable=[
        "title",
        "description",
        "image"
    ];
    protected $guarded=[
        "id"
    ];
}
