<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminModel extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
}
