<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ReportImage extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'report_id'];

    public function report()
    {
      return $this->belongsTo(Report::class);
    }

    public function getImageAttribute($value)
    {
      return url(Storage::url($value));
    }
}
