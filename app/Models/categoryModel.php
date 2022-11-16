<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
   use HasFactory;
   protected $table = 'category';
   public $timestamps = false;
   protected $primaryKey = 'id_category';
   // https://stackoverflow.com/questions/29347253/sqlstate42s22-column-not-found-1054-unknown-column-id-in-where-clause-s
   
//    một số trường tự động
}
