<?php

namespace App;

use App\Http\Controllers\AnswerController;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'user_id',
        'state',
        'title',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
