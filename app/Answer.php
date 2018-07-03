<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [
        'user_id',
        'topic_id',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
