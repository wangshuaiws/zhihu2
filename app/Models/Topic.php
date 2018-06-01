<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name', 'questions_count'];

    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
