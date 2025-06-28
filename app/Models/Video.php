<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'url',
        'section_id',
    ];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
