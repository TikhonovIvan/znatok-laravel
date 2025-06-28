<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'section_id',
        'content'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
