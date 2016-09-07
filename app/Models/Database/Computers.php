<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Computers extends Model
{
    protected $fillable = ['subnet_id', 'ip_address', 'mac_address', 'serial_number'];
}
