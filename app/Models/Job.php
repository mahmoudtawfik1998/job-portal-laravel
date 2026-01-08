<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model

{
        protected $fillable = [
        'title',
        'description',
        'category_id',
        'type',
        'salary',
        'experience',
        'status',
        'featured'
    ];
    public function applications()
{
    return $this->hasMany(Application::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}



}
