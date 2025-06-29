<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['test_id', 'text'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($question) {
            // При удалении вопроса удаляем все связанные ответы
            $question->answers()->delete();
        });
    }
}
