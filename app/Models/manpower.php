<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manpower extends Model
{
    use HasFactory;
    protected $fillable = ['noreg','name','jabatan'];
    protected $table='manpower';
}
