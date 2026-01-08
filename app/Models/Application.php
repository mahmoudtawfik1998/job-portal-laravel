<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function job()
{
    return $this->belongsTo(Job::class);
}
protected $fillable = [
    'job_id',
    'name',
    'email',
    'phone',
    'cover_letter',
];
}
