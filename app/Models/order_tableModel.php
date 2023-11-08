<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_tableModel extends Model
{
    use HasFactory;
    protected $table = 'order_table';
    public $timestamps = false;
    protected $primaryKey = 'id_order';
}
