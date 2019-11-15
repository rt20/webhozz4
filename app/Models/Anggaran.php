<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
     protected $fillable = ['code', 'name', 'budget', 'biaya', 'sisa'];
}
