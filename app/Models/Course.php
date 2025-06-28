<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'title',
        'category',
        'short_description',
        'status',
        'cover',
        'course_code',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }



    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function lectures() {
        return $this->hasMany(Lectures::class);
    }


}
