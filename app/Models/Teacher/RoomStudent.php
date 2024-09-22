<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStudent extends Model
{
    use HasFactory;

    protected $table = "room_students";
    protected $guarded = [];
}
