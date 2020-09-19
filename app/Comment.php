<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const ALLOW = 1;
    const DISALLOW = 0;

    protected $fillable = ['text'];

    public function post()
    {
        $this->belongsTo(Post::class);
    }

    public function author()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function allow()
    {
        $this->status = self::ALLOW;
        $this->save();
    }

    public function disallow()
    {
        $this->status = self::DISALLOW;
        $this->save();
    }

    public function toggleStatus()
    {
        return $this->status ? $this->disallow() : $this->allow();
    }
}
