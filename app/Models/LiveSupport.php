<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Musonza\Chat\Traits\Messageable;

class LiveSupport extends Model
{
    use HasFactory,Messageable;
    
}
