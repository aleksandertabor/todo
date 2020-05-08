<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const PENDING = 'pending';
    const IN_PROGRESS = 'in progress';
    const COMPLETED = 'completed';

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
