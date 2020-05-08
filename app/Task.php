<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const PENDING = 'pending';
    const IN_PROGRESS = 'in progress';
    const COMPLETED = 'completed';

    protected $guarded = [];

    public function toggleCompletion()
    {
        if (! $this->isCompleted()) {
            $this->status = self::COMPLETED;
        } else {
            $this->status = self::PENDING;
        }

        $this->save();
    }

    public function toggleInProgress()
    {
        $this->status = ! $this->isInProgress() ? self::IN_PROGRESS : self::PENDING;

        $this->save();
    }

    public function isInProgress()
    {
        return $this->status === self::IN_PROGRESS;
    }

    public function isCompleted()
    {
        return $this->status === self::COMPLETED;
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
