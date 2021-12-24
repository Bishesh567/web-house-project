<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdboutUs extends Model
{
    use HasFactory;

    protected $table='adbout_us';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
