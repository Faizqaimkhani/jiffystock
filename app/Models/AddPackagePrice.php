<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPackagePrice extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'duration_in_days', 'price'];

}
