<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    const CREATED = 1;
    const ASSIGNED = 2;
    const IN_PROGRESS = 3;
    const DONE = 4;

    protected $fillable = ['name', 'created_by', 'assigned_to', 'description', 'status'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public static function getStatuses()
    {
        return [
            self::CREATED => 'Created',
            self::ASSIGNED => 'Assigned',
            self::IN_PROGRESS => 'In progress',
            self::DONE => 'Done',
        ];
    }
}
